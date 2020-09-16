$(document).ready(function() {
    let slotPrice = 50; // the cost of one spin 
    let usrnm = sessionStorage.getItem("username");
    let interv;
    let elmnts = Array.from(document.getElementsByClassName("slot_col"));
    let today = new Date();

    //////////////////   Dates   //////////////////

    // Creating object for click Dates
    let datesOfClicks = {
        username: usrnm,
        date: (today.getFullYear() +
            '-' + pad2(today.getMonth() + 1) +
            '-' + pad2(today.getDate())),
        startClickDate: "",
        stopClickDate: "",
        stopDate: "",
        win: "",
        total: ""
    }

    // function for sending button clicks to server
    function sendDates() {
        $.ajax({
            type: "POST",
            url: "http://localhost/slot/back/clicks.php",
            data: datesOfClicks,
            dataType: "json"
        });
    }

    ///////////////////////////////////////////////
    function pad2(number) {

        var str = '' + number;
        while (str.length < 2) {
            str = '0' + str;
        }

        return str;
    }

    function getTime() {
        date = new Date();
        return (pad2(date.getHours()) + ":" + pad2(date.getMinutes()) + ":" + pad2(date.getSeconds()));
    }


    $(".content").prepend("<h1>Hello " + usrnm + "!</h1>");

    // Print the amount of money the user has 
    $.ajax({
        type: "POST",
        url: "back/slotback.php",
        data: { username: usrnm },
        dataType: "json",
        success: function(response) {
            showMoney(response);
        }
    });

    function showMoney(money) {
        $("#pt").val(money);
    }

    $("#update-button").click(function() {
        $.ajax({
            type: "post",
            url: "back/moneyupdate.php",
            data: {
                username: usrnm,
                money: $("#amnt-add").val()
            },
            dataType: "json",
            success: function(response) {
                showMoney(response);
                $("#amnt-add").val('');
            }
        });
    });

    // Creating array of slot icon images
    let slot_images = new Array(8);
    for (let i = 0; i < slot_images.length; ++i) {
        slot_images[i] = "<img src='img/" + (i + 1) + ".png' id =" + (i + 1) + ">";
    }

    // Array random insert
    function imagesRandomInsert() {
        let temp = new Array(8);
        for (let i = 0; i < temp.length; i++) {
            temp[i] = slot_images[Math.floor(Math.random() * 8)];
        }
        return temp;
    }

    // Filling slot columns with images from the array of slot icon images -> slot_col
    function imageSet() {
        for (let i = 0; i < elmnts.length; ++i) {
            let temp = imagesRandomInsert();
            for (let j = 0; j < 8; ++j) {
                elmnts[i].insertAdjacentHTML('beforeend', temp[j]);
            }
        }
    }
    imageSet();

    // function for starting the spin
    function start_spin(btn) {
        // imageSet();


        datesOfClicks.startClickDate = getTime();
        interv = setInterval(function() {
            imageSet();
            for (let key = 0; key < elmnts.length; ++key) {
                if (elmnts[key].scrollTop == 100) {
                    temp = elmnts[key].firstElementChild;
                    elmnts[key].removeChild(temp);
                    elmnts[key].appendChild(temp);
                } else {
                    elmnts[key].scrollTop += 100;
                }
            }
        }, 10);
    }

    // function that changes the button's functional
    let start = true;

    function toggleButton(el) {
        let btn = document.getElementById("btn");
        if (start) {

            $(".update").css("display", "none");

            let money_value = $("#pt").val();
            if (money_value >= slotPrice) {
                showMoney(money_value - slotPrice);
                updateMoneyDB(money_value - slotPrice);

                $(".slot_col").empty();
                start_spin(btn);

                btn.style.display = "none";

                setTimeout(function() {
                    btn.style.display = "block";
                }, 1500);

                start = false;
                btn.innerHTML = "Stop";
                btn.style.background = "red"
            } else {
                $(".update").css("display", "flex");

            }
        } else {
            stop_spin(btn);
        }
    }

    // function for stopping the spin
    let count = 0;

    function stop_spin(btn) {
        $(".myButton").prop('disabled', true);
        datesOfClicks.stopClickDate = getTime();

        let stop_interv = setInterval(function() {

            if (count < 3) {
                elmnts.shift();
                count++;

            } else {

                datesOfClicks.stopDate = getTime();
                clearInterval(interv);
                elmnts = Array.from(document.getElementsByClassName("slot_col"));
                for (let i = 0; i < 4; ++i) {
                    if (elmnts[i].scrollTop == 100) {
                        temp = elmnts[i].firstElementChild;
                        elmnts[i].removeChild(temp);
                        elmnts[i].appendChild(temp);
                    }
                }
                start = true;
                btn.innerHTML = "Spin";
                btn.style.background = "#44c767";
                count = 0;
                clearInterval(stop_interv);

                let win_i = spinWin() * slotPrice * 2;
                let total_i = win_i + Number($("#pt").val());
                if (spinWin() != 0) {
                    console.log($("#pt").val()) //can be cleared


                    console.log(total_i)
                    datesOfClicks.win = win_i;
                    Swal.fire(
                        'Good job!',
                        'You won ' + win_i + '$ !',
                        'success'
                    )
                    datesOfClicks.total = total_i;

                    updateMoneyDB(total_i);
                    showMoney(total_i);
                    console.log(win_i, total_i) // can be cleared
                } else {
                    datesOfClicks.win = win_i;
                    datesOfClicks.total = total_i;
                    updateMoneyDB(total_i);
                    showMoney(total_i);
                }
                sendDates();
                $(".myButton").prop('disabled', false);
            }
        }, 450);
    }

    $("#btn").click(function(e) {
        toggleButton();
    });

    // Function for updateing money in DB
    function updateMoneyDB(data) {
        $.ajax({
            type: "POST",
            url: "http://localhost/slot/back/amount.php",
            data: {
                username: usrnm,
                money: data
            },
            dataType: "json",
        });
    }

    // Winning function
    function spinWin() {

        let col_1 = Array.from(elmnts[0].children);
        let col_2 = Array.from(elmnts[1].children);
        let col_3 = Array.from(elmnts[2].children);
        let col_4 = Array.from(elmnts[3].children);

        let col_id = new Array(4);
        for (var i = 0; i < col_id.length; i++) {
            col_id[i] = new Array(4);
        }
        for (let i = 0; i < 4; ++i) {
            if (i == 0) {
                for (let j = 0; j < 4; ++j) {
                    col_id[j][0] = Number(col_1[j].id);
                }
            }
            if (i == 1) {
                for (let j = 0; j < 4; ++j) {
                    col_id[j][1] = Number(col_2[j].id);
                }
            }
            if (i == 2) {
                for (let j = 0; j < 4; ++j) {
                    col_id[j][2] = Number(col_3[j].id);
                }
            }
            if (i == 3) {
                for (let j = 0; j < 4; ++j) {
                    col_id[j][3] = Number(col_4[j].id);
                }
            }
        }

        let count = 0;
        if (col_id[0][0] == col_id[1][1] && col_id[1][1] == col_id[2][2] && col_id[2][2] == col_id[3][3]) {
            count += 5;
        }
        if (col_id[0][3] == col_id[1][2] && col_id[1][2] == col_id[2][1] && col_id[2][1] == col_id[3][0]) {
            count += 5;
        }


        for (let i = 0; i < col_id.length; i++) {
            if (col_id[i].every((val, i, arr) => val === arr[0])) {
                count += 2;
                return 2;
            }
        }
        return 0;
    }
});