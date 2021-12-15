    let tbody = document.querySelector("tbody");
    //=====================Delete=====================
    let deleteDataFromDB = function(id){
        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {
                id: id			
            },
            cache: false,
            success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode == 200){
                    alert("Data Successfully deleted from Database!!");
                    location.assign('getData.php');
                }
            }
        });
    }
    let clickDel = function(){
        let row = this.parentNode.parentNode;
        let id = row.children[0].innerText;
        if(id !== ""){
            deleteDataFromDB(id)
        }
    }
    let deleteRow = function(row, clickDel){
        let delBtn = row.querySelector(".delBtn");
        delBtn.onclick = clickDel;
    }

    //====================update====================

    let updateData = function(id){
        let title = document.querySelector("#title");
        let body = document.querySelector("#body");
        let form = document.querySelector(".update");
        if((title.value)!== "" && (body.value)!== ""){
            $.ajax({
                url: "update.php",
                type: "POST",
                data: {
                    id: id,
                    title: title.value,
                    body: body.value,				
                },
                cache: false,
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode == 200){
                        alert("Data Successfully Updated!!");
                        location.assign('getData.php');
                    }
                }
            });
        } else{
            alert("Fillup all input field");
        }
        title.value ="";
        body.value ="";

        form.style.display = "none";
        // console.log(title);
        // console.log(body);
    }

    let clickEdit = function() {
        let form = document.querySelector(".update");
        let row = this.parentNode.parentNode;
        let id = row.children[0].innerText;
        form.style.display = "block";

        let updateBtn = document.querySelector("#formUpdateBtn");
        updateBtn.addEventListener("click", function() {
            updateData(id);
        });
    }

    let updateRow = function(row, clickEdit) {
        let editBtn = row.querySelector(".updateBtn");
        editBtn.onclick = clickEdit;
    }

    for(let i=0; i<tbody.children.length; i++){
        deleteRow(tbody.children[i], clickDel);
        updateRow(tbody.children[i], clickEdit);
    }
