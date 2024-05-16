document.addEventListener('DOMContentLoaded', function() {
    const littlePrinceImage = document.getElementById('little-prince-image');
    const roseImage = document.getElementById('rose-image');
  
    // Toggle visibility of rose image when clicking on Little Prince image
    littlePrinceImage.addEventListener('click', function() {
      roseImage.classList.toggle('hidden');
    });
  
    // Toggle visibility of Little Prince image when clicking on Rose image
    roseImage.addEventListener('click', function() {
      littlePrinceImage.classList.toggle('hidden');
    });
  });
  