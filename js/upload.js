function triggerClick() {
      document.querySelector('#profileImage').click();
    }

    function displayImage(e) {
      if(e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(e.files[0]);
      }
    }

/*//update
    function triggerClickupdate() {
      document.querySelector('#profileImageUpdate').click();
    }

    function displayupdateImage(e) {
      if(e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          document.querySelector('#displayUpdate').setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(e.files[0]);
      }
    }

*/