let connection = new WebSocket("//james-tyner-itp405-node.herokuapp.com/");

connection.onerror = function(){
  console.log("Failed to connect to server");
}

connection.onmessage = function(event){
  if (document.querySelector("#doc-textbox").innerText != event.data){
    document.querySelector("#doc-textbox").innerText = event.data;
  }
}

document.querySelector("#doc-textbox").addEventListener("input", function(event){
  event.preventDefault(); //prevent page refresh for form submission

  let contents = document.querySelector("#doc-textbox").innerText;
  connection.send(contents);
  console.log(contents);
})
