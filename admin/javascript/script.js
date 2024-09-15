document.addEventListener('DOMContentLoaded', () => {
    const viewRoomsButton = document.getElementById('viewRooms');
    const viewBookingsButton = document.getElementById('viewBookings');
    const viewActivityButton = document.getElementById('viewActivity');
  
    viewRoomsButton.addEventListener('click', () => {
      alert('Viewing rooms...');
    });
  
    viewBookingsButton.addEventListener('click', () => {
      alert('Viewing bookings...');
    });
  
    viewActivityButton.addEventListener('click', () => {
      alert('Viewing activity...');
    });
  
    const searchForm = document.getElementById('searchForm');
    searchForm.addEventListener('submit', (event) => {
      event.preventDefault();
      alert('Searching for rooms...');
    });
  });
  