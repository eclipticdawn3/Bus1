<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Selection - BUSONE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/seatmap.css">
</head>
<body>

<div class="container">
        <a href="index.php" class="btn btn-outline-secondary home-btn">Home</a>
        <h2 class="mt-4 mb-3">Select Your Seats</h2>
        <div id="seat-map-container">
            </div>
        <div id="selected-seats-display" class="mt-3">
            <p>Selected Seats: <span id="selected-seats-numbers">None</span></p>
        </div>

        <button id="confirm-seats-btn" class="btn btn-primary appointment-btn mt-3" disabled>Confirm Seats</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ** PASTE ALL OF YOUR JAVASCRIPT CODE FROM js/seatmap.js HERE **
        $(document).ready(function() {
            const seatMapContainer = $('#seat-map-container');
            const selectedSeatsDisplay = $('#selected-seats-numbers');
            const confirmSeatsButton = $('#confirm-seats-btn');
            let selectedSeats = []; // Array to store selected seat numbers

            const numRows = 10; // 10 rows for 40 seats (10 rows * 4 columns = 40 seats)
const seatsPerRow = 4;
            let seatNumberCounter = 1; // Counter to assign seat numbers

            for (let row = 1; row <= numRows; row++) {
                for (let col = 1; col <= seatsPerRow; col++) {
                    const seatNumber = seatNumberCounter++;
                    const seatElement = $('<div>')
                        .addClass('seat')
                        .text(seatNumber)
                        .data('seatNumber', seatNumber); // Store seat number as data attribute

                    seatMapContainer.append(seatElement);
                }
            }

            // Seat click handler
            seatMapContainer.on('click', '.seat', function() {
                const seat = $(this);
                if (seat.hasClass('occupied')) {
                    return; // Do nothing if seat is occupied
                }

                seat.toggleClass('selected'); // Toggle 'selected' class on click
                const seatNumber = seat.data('seatNumber');

                if (seat.hasClass('selected')) {
                    selectedSeats.push(seatNumber); // Add to selected seats array
                } else {
                    selectedSeats = selectedSeats.filter(item => item !== seatNumber); // Remove from selected seats array
                }

                updateSelectedSeatsDisplay();
                updateConfirmButtonState();
            });

            function updateSelectedSeatsDisplay() {
                selectedSeatsDisplay.text(selectedSeats.length > 0 ? selectedSeats.join(', ') : 'None');
            }

            function updateConfirmButtonState() {
                confirmSeatsButton.prop('disabled', selectedSeats.length === 0); // Disable if no seats selected
            }


            // ** Placeholder for making seats occupied (for testing) **
            // In a real application, this would be based on data from your backend
            const occupiedSeatNumbers = [2, 5, 12, 25, 48, 59]; // Example occupied seats
            occupiedSeatNumbers.forEach(seatNumber => {
                seatMapContainer.find(`.seat:nth-child(${seatNumber})`).addClass('occupied');
            });


            confirmSeatsButton.on('click', function() {
                if (selectedSeats.length > 0) {
                    // ** In a real application, you would send selectedSeats to the backend here **
                    // For now, just visually confirm selection
                    selectedSeats.forEach(seatNumber => {
                        seatMapContainer.find(`.seat:nth-child(${seatNumber})`).removeClass('selected').addClass('confirmed-selected'); // Change to confirmed style
                    });
                    alert("Seats Confirmed: " + selectedSeats.join(', ')); // Replace with your booking logic/popup
                    selectedSeats = []; // Clear selected seats after confirmation (for this example)
                    updateSelectedSeatsDisplay();
                    updateConfirmButtonState();
                }
            });


        });
    </script>
<a href="index.php" class="btn btn-outline-secondary home-btn">Home</a>
</body>

</body>
</html>