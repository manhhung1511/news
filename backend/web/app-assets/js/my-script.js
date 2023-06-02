function insertUrlAndShow(id, url) {
    // notif success
    if ($('html').attr('lang') == 'en') {
        toastr['success']('', 'Upload photo successfully', {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
            rtl: false
        });
    } else {
        toastr['success']('', 'Tải ảnh lên thành công', {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
            rtl: false
        });
    }
}


const toBase64 = file => new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => resolve(reader.result);
    reader.onerror = error => reject(error);
});

async function readFileV2(evt, id) {
    var file = evt.target.files[0];
    if (file) {
        $('.bg-overlay').addClass('loading');
        $('#spin-loading').addClass('loading');
        if (file.type.match(/image/) && file.type !== 'image/svg+xml') {
            var imageBase64 = await toBase64(file);
            imageBase64 = imageBase64.split(',')[1];

            var data = new FormData();
            data.append('key', '7d08f7f9177f9a2beaaf1f02d4f8b83c');
            data.append('image', imageBase64);

            fetch("https://api.imgbb.com/1/upload", {
                method: "POST",
                body: data,
            }).then(function (response) {
                $('.bg-overlay').removeClass('loading');
                $('#spin-loading').removeClass('loading');
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error("Could not reach the API: " + response.statusText);
                }
            }).then(function (data) {
                $('#' + id).val(data.data.image.url);
                insertUrlAndShow(id, data.data.image.url);
            }).catch(function (error) {
                console.log(error);
            });
        } else {
            alert("Failed file type");
        }
    } else {
        alert("Failed to load file");
    }
}

function addClassTextShake(contentChange) {
    $(contentChange).addClass('text-shake');
    setTimeout(function() {
        $(contentChange).removeClass('text-shake');
    }, 1000);
  }

$(window).on('load',  function(){
    if (feather) {
	   feather.replace({ width: 14, height: 14 });
    }

     // customize choose file
     $(document).on('click', '.btn-choose-file', function() {
    	$(this).find('+ .img-upload-notif').click();
    });

    $('#inputImageBanner').change(function (evt) {
        readFileV2(evt, 'news-image');
    });
});




