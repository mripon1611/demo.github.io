$(document).ready(function() {

    let jText = new XMLHttpRequest();
    jText.onload = function() {
        let myArr = JSON.parse(this.responseText);
        let thead= document.querySelector("#table thead");
        let tbody= document.querySelector("#table tbody");
        let htr =document.createElement("tr");
        for(let x in myArr[0]){
            let th = document.createElement("th");
            th.innerText = x;
            htr.appendChild(th);
        }
        let th = document.createElement("th");
        th.innerText = "Insert To";
        htr.appendChild(th);
        thead.appendChild(htr);
        for (let x in myArr) {
            let tr = document.createElement("tr");
            for(let y in myArr[x]) {
                let col =document.createElement("td");
                col.innerText = myArr[x][y];
                tr.appendChild(col);
            }
            let col = document.createElement("td");
            let btn = document.createElement("button");
            let i = document.createElement("i");
            i.className = "fas fa-plus";
            btn.className = "insertBtn";
            btn.appendChild(i);
            col.appendChild(btn);
            tr.appendChild(col);
            tbody.appendChild(tr);
        }
        $("tbody tr").on({
            click : function(){
                $(this).css("background-color", "yellow");
            },
            mouseover: function() {
                $(this).css("background-color", "#ebf1f5");
            },
            mouseleave: function() {
                $(this).css("background-color", "white");
            }

        });

        let inserIcn= function(){
            let p = this.parentNode.parentNode.children;
            let userId = p[0].innerText;
            let title = p[2].innerText;
            let body = p[3].innerText;
            if(userId!="" && title!="" && body!=""){
                requestData(userId, title, body);
            }
        }
        let insertData = function(tRow, inserIcn){
            let insrtBnt = tRow.querySelector(".insertBtn");
            insrtBnt.onclick = inserIcn;
        }

        for(let i=0; i<tbody.children.length; i++){
            insertData(tbody.children[i], inserIcn);
        } 
        let requestData = function (userId, title, body) {
            $.ajax({
                url: "insert.php",
                type: "POST",
                data: {
                    userId: userId,
                    title: title,
                    body: body,				
                },
                cache: false,
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode == 200){
                        alert("Data Successfully inserted into Database!!")
                    }
                }
            });
        }

    }
    jText.open("GET", "https://jsonplaceholder.typicode.com/posts");
    jText.send();

});

