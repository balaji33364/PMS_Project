<html>
<head>
    <style>

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.monospace {
  font-family: "Lucida Console", Courier, monospace;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}


   

body {
  background-color: rgb(229, 237, 240);

  
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {font-size: 10px;}
.button2 {font-size: 12px;}
.button3 {font-size: 16px;}
.button4 {font-size: 20px;}
.button5 {font-size: 24px;}
</style>
<body>

    <form action="qrgenerator" method="post" enctype="multipart/form-data">
        @csrf
       <p class="monospace"> Enter the URL: <input type="text" name="url"><br>
        Enter the output file name: <input type="text" name="output_file"></p>
        
        <div class="col-md-6">
            <input type="file" name="cover_image" class="form-control">
        </div>
         
        <input type="submit" button class="button button1">
        </form>

</body>
</html>