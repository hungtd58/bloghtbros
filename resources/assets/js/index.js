function createArticle() {
    var title = document.getElementById('title').value;
    if(title == null || title == ""){
        document.getElementById('form_title').setAttribute("class", "form-group has-error has-feedback");
        document.getElementById('labeltitle').setAttribute("style", "display : block");
        document.getElementById('spantitle').setAttribute("style", "display : block");
        return;
    }

    addNewCodingArticle();

}


function deleteArticle(id){
    deleteCodingArticle(id);
}

function addNewCodingArticle(){

    var token = $('meta[name="csrf-token"]').attr('content');

    var data = {
        '_token': token,
        'title' : document.getElementById('title').value,
        'brief' : document.getElementById('brief').value,
        'content' : document.getElementById('content').value,
        'keyword' : document.getElementById('keyword').value
    };

    console.log(data);

    $.ajax({
        url: "/blogHtBros/create",
        type:"POST",
        beforeSend: function (xhr) {
            if (token) return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        },
        data: data,
        success:function(response){
            location.reload();

        },error:function(){
            alert("lỗi");
        },
        async:   false
    });
}


function deleteCodingArticle(id){

    var token = $('meta[name="csrf-token"]').attr('content');

    var data = {
        '_token': token,
        'id': id
    };

    console.log(data);

    $.ajax({
        url: "/blogHtBros/delete",
        type:"POST",
        beforeSend: function (xhr) {
            if (token) return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        },
        data: data,
        success:function(response){
            location.reload();

        },error:function(){
            alert("lỗi");
        },
        async:   false
    });
}