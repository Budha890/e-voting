<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Finder Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Room Finder Dashboard</h1>
        <input type="text" id="searchInput" placeholder="Search rooms...">
        <button onclick="searchRooms()">Search</button>
    </header>
    <main>
        <section id="roomList">
            <!-- Room list will be populated here -->
        </section>
        <section id="bookingTrends">
            <canvas id="bookingChart"></canvas>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
</body>
</html>
