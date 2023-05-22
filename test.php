
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <h1>Content fetched through ajax</h1>
    <input type="text" name="id_num" id="id_num" onkeyup="getData(this.value)">
    <button id="nxt_btn">Edit</button>
    <select name="datas" id="datas">
        <option value=""></option>
    </select>

    <div id="container">
        <br>
    </div>

</body>
<script>
        const btn = document.getElementById('nxt_btn');
        const str = document.querySelector('input').value;
 
        btn.addEventListener('click', function(){
            const xhr = new XMLHttpRequest();

            xhr.open("POST", "edit.php?q="+str, true);

            xhr.onload = function(){
                const id_inp = document.createElement('input');
                const name_inp = document.createElement('input');
                const container = document.getElementById('container');
            
                id_inp.setAttribute('placeholder', this.responseText);
                name_inp.setAttribute('placeholder', 'Enter name');
                container.append(id_inp);
                container.append(name_inp);
            }

            xhr.send();
      
        })

        function getData(str){
            const xhr = new XMLHttpRequest();

            xhr.open("POST", "getdata.php?q="+str, true);

            xhr.onload = function(){
                document.querySelector('option').innerHTML = this.responseText;
            }

            xhr.send();
            console.log(str);
        }
    </script>
</html>
