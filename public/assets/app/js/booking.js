function select_room_booking(token, url)
{
    var selectedOption = $('#room_booking').find(":selected");
    var id_room = selectedOption.val();
    var room_number = selectedOption.attr('room_number');
    var people_number = selectedOption.attr('people_number');
    var room_cat_name = selectedOption.attr('room_cat_name');

    var availability = selectedOption.attr('availability');

    $('#room_number_details').text(room_number);
    $('#people_number_details').text(people_number)
    $('#room_category_details').text(room_cat_name);

    var selectedOption = $('#room_booking').find(":selected");
    var room_price = selectedOption.attr('room_price');

    var arrival_date_booking = $('#arrival_date_booking').val();
    var departure_date_booking = $('#departure_date_booking').val();

    var ref_reservation = $('#ref_reservation').val();

    //console.log(room_number);

    //console.log(ref_reservation);

    $('.id_room_session').val(id_room);
    $('.room_number_session').val(room_number);
    $('.room_category_session').val(room_cat_name);
    $('.room_price_session').val(room_price);
    $('.room_people_session').val(people_number);
    $('.count_availbty_session').val(availability);

    $.ajax({
        type: 'post',
        url: url,
        data: {
            '_token': token,
            'id_room': id_room,
            'arrival_date_booking': arrival_date_booking,
            'departure_date_booking': departure_date_booking,
            'room_price': room_price,
            'ref_reservation': ref_reservation,
        },
        success:function(response)
        {
            //console.log(response.daysDifference);
            $('#total_price_booking_details').text(response.total_price);
            $('#days_difference').val(response.daysDifference);
            $('#total_include_service').text(response.total_include_service);
            //console.log('Price : ' + response.total_price + '\n' + 'Total :' +  response.total_include_service);

            $('.number_of_days_session').val(response.daysDifference);
            $('#number_of_days_details').text(response.daysDifference);


            $('.price_per_night_session').val(response.room_price);
            $('#price_per_night_details').text(response.room_price);

            $('.total_price_booking_session').val(response.total_price);
            $('.total_price_service_included_session').val(response.total_include_service);

            var total_price_booking_details = response.total_price;
            var booking_other_services_details = response.total_service_assigns_perday;
            //var total = parseFloat(booking_other_services_details) + parseFloat(total_price_booking_details);

            $('#booking_other_services_details').text(booking_other_services_details);
            $('.booking_other_services_session').val(booking_other_services_details);

            //console.log(response.total_all);


            $('#total_booking_details').text(response.total_all);

            $('#count_availbty_details').text(response.availabilityText);

            //console.log(total.toFixed(2));

            if(response.count <= 0)
            {
                $('#count_availbty_details').removeClass('bg-danger');
                $('#count_availbty_details').addClass('bg-success');
            }
            else
            {
                $('#count_availbty_details').addClass('bg-danger');
                $('#count_availbty_details').removeClass('bg-success');
            }

            if(availability <= 0)
            {
                //available
                $('.confirm_availability').removeAttr('disabled', true);
            }
            else
            {
                // not available
                $('.confirm_availability').attr('disabled', true);
            }
        }
    });
}

function select_customer_booking()
{
    var selectedOption = $('#booking_customer').find(":selected");
    var booking_customer = selectedOption.text();
    var booking_id_customer = selectedOption.val();

    $('#customer_booking_details').text(booking_customer);

    $('.booking_id_customer_session').val(booking_id_customer);
    $('.booking_customer_session').val(booking_customer);
}

function select_arrival_date_booking(token, url)
{
    var selectedOption = $('#room_booking').find(":selected");
    var id_room = selectedOption.val();

    var arrival_date_booking = $('#arrival_date_booking').val();
    var departure_date_booking = $('#departure_date_booking').val();

    var selectedOption = $('#room_booking').find(":selected");
    var room_price = selectedOption.attr('room_price');

    var ref_reservation = $('#ref_reservation').val();

    $('#arrival_date_booking_details').text(arrival_date_booking);

    $('.arrival_date_booking_session').val(arrival_date_booking);

    $.ajax({
        type: 'post',
        url: url,
        data: {
            '_token': token,
            'id_room': id_room,
            'arrival_date_booking': arrival_date_booking,
            'departure_date_booking': departure_date_booking,
            'room_price': room_price,
            'ref_reservation': ref_reservation,
        },
        success:function(response)
        {
            //console.log(response.daysDifference);
            $('#total_price_booking_details').text(response.total_price);
            $('#days_difference').val(response.daysDifference);
            $('#total_include_service').text(response.total_include_service);
            //console.log('Price : ' + response.total_price + '\n' + 'Total :' +  response.total_include_service);

            $('.number_of_days_session').val(response.daysDifference);
            $('#number_of_days_details').text(response.daysDifference);

            $('.price_per_night_session').val(response.room_price);
            $('#price_per_night_details').text(response.room_price);

            $('.total_price_booking_session').val(response.total_price);
            $('.total_price_service_included_session').val(response.total_include_service);

            var total_price_booking_details = response.total_price;
            var booking_other_services_details = response.total_service_assigns_perday;
            //var total = parseFloat(booking_other_services_details) + parseFloat(total_price_booking_details);

            $('#booking_other_services_details').text(booking_other_services_details);
            $('.booking_other_services_session').val(booking_other_services_details);

            //$('#total_booking_details').text(total.toFixed(2));
            $('#total_booking_details').text(response.total_all);
        }
    });
}

function select_departure_date_booking(token, url)
{
    var selectedOption = $('#room_booking').find(":selected");
    var id_room = selectedOption.val();

    var arrival_date_booking = $('#arrival_date_booking').val();
    var departure_date_booking = $('#departure_date_booking').val();

    var selectedOption = $('#room_booking').find(":selected");
    var room_price = selectedOption.attr('room_price');

    var ref_reservation = $('#ref_reservation').val();

    $('#departure_date_booking_details').text(departure_date_booking);

    $('.departure_date_booking_session').val($('#departure_date_booking').val());

    $.ajax({
        type: 'post',
        url: url,
        data: {
            '_token': token,
            'id_room': id_room,
            'arrival_date_booking': arrival_date_booking,
            'departure_date_booking': departure_date_booking,
            'room_price': room_price,
            'ref_reservation': ref_reservation,
        },
        success:function(response)
        {
            //console.log(response.total_price);
            $('#total_price_booking_details').text(response.total_price);
            $('#days_difference').val(response.daysDifference);
            $('#total_include_service').text(response.total_include_service);
            //console.log('Price : ' + response.total_price + '\n' + 'Total :' +  response.total_include_service);

            $('.number_of_days_session').val(response.daysDifference);
            $('#number_of_days_details').text(response.daysDifference);

            $('.price_per_night_session').val(response.room_price);
            $('#price_per_night_details').text(response.room_price);

            $('.total_price_booking_session').val(response.total_price);
            $('.total_price_service_included_session').val(response.total_include_service);

            var total_price_booking_details = response.total_price;
            var booking_other_services_details = response.total_service_assigns_perday;
            //var total = parseFloat(booking_other_services_details) + parseFloat(total_price_booking_details);

            $('#booking_other_services_details').text(booking_other_services_details);
            $('.booking_other_services_session').val(booking_other_services_details);

            //$('#total_booking_details').text(total.toFixed(2));
            $('#total_booking_details').text(response.total_all);
        }
    });
}


//Add room session variable
function room_session(url, token, id_room, text_room)
{

    console.log(token);

    $.ajax({
        type: 'post',
        url: url,
        data: {
            '_token': token,
            'id_room': id_room,
            'text_room': text_room
        },
        success:function(response)
        {
            console.log(response);
        }
    });
}


$('#booking-reserve').click(function(e){
    e.preventDefault();

    $('#save-booking-form').submit();
});

