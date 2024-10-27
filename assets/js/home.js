function speech() {
    // lấy tham chiếu output div
    var output = document.getElementById("output");
    // lấy tham chiếu action element
    var action = document.getElementById("action");
    // Đối tượng nhận dạng giọng nói mới
    var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
    var recognition = new SpeechRecognition();
    // cài đặt ngôn ngữ 
    recognition.lang = 'vi-VN';
    // Điều này sẽ chạy khi nhận dạng giọng nói bắt đầu
    recognition.onstart = function() {
        action.innerHTML = "<small><br>Đang lắng nghe....Hãy nói </small>";
    };

    recognition.onspeechend = function() {
        action.innerHTML = "<small><br>Ngừng nghe, hy vọng bạn đã xong ...</small>";
        recognition.stop();
    }

    // Điều này sẽ chạy khi nhận dạng giọng nói trả về kết quả
    recognition.onresult = function(event) {
        var transcript = event.results[0][0].transcript;
         
        output.innerHTML = "<b>Hiển thị:</b> " + transcript + "<br/>";
        document.getElementById('textt').setAttribute('value', transcript);

        output.classList.remove("hide");

    };
    recognition.start();
}
function setTrangThaiThietBi(id){
    fetch('api/ThietBiApi.php',{
        method:'post',
        headers:{
            'Content-type':'application/json',
            'Accept':'*'
        },
        body:JSON.stringify({
            "id": id,
            "trangThaiThietBi": true
        })
    }).then(res=>res.json())
    .then(data=>{
        console.log(data)
    }).catch(err=>console.log(err));
}