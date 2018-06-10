//Document execution of the Mining Simulator
$(document).ready(function() {
    initialPost();
    hidePannel();
    initialData();
    sseHandler();
    showModal();
    console.log(input_data);
    $("#hash_button_new").click(function(){
        console.log(button_disabled);
        if(!concatById(input_data) || button_disabled) return;
        console.log("hash: \n" + hash_message);
        var hash = Crypto.SHA256(String(hash_message));
        correctHash(hash,$("#dificulty_new").val());
    });
    $("#random_hash_new").click(function(){
      $("#merkle_root_new").val(randomHash());
    });
    $("#dinamic_board_text_btn").click(function(){
      hideTextArea(true);
    });
    $(".dinamic_board_btn").click(function(){
      var index = $(this).parent().parent().index(".dinamic_board");
      console.log(index);
      showData(index);
      hideTextArea(false);
    });
    $("#logout-button").click(function(){
        logout();
    });
    $(".next-modal").click(function(){
        nextModalContent();
    });
    $(".previous-modal").click(function(){
        previousModalContent();
    });
    $(".close-modal").click(function(){
        hideModal();
    });
});
