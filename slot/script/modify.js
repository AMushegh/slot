$(document).ready(function() {
    // $('#a').hide();

    // Function for set Table options
    function setOptions(data) {
        $.ajax({
            type: "POST",
            url: "http://localhost/slot/back/interface.php",
            data: {
                username: data,
                from_date: $("#date1").val(),
                to_date: $("#date2").val()
            },
            dataType: "html",
            success: function(response) {
                $("#tbody").html(response);
            }
        });
    }

    // Deleting the selected tupele from DB  
    $('.modifyButton').click(function(e) {
        let dataID = $(this).attr('id');
        alert(1);
        $.ajax({
            type: 'post',
            url: "http://localhost/slot/back/tst.php",
            data: {
                id: dataID,
            },
            dataType: "json",
            success: function(response) {
                location.reload()
            }
        });

    });

    // Setting all click's records of every user
    setOptions('All users');

    // Setting all click's records with selected parametres
    $('#btnn').click(function() {
        alert(1)
        $("date1").val() = ''
    });

    $(document).on('change', 'select', function() {
        setOptions($("#users option:selected").text());
    });

    // $('#date1').change(function() {
    //     $('#a').show();
    //     let temp = $("date1").val();
    //     $("date2").attr("min", temp);
    //     // setOptions($("#users option:selected").text());
    // });

    $('#date2').change(function() {
        setOptions($("#users option:selected").text());
    });

});