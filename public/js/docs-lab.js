let connection = new WebSocket("wss://james-tyner-itp405-node.herokuapp.com/");

connection.onerror = function(){
  console.log("Failed to connect to server");
}

connection.onmessage = function(event){
  if (document.querySelector("#doc-textbox").innerText != event.data){
    document.querySelector("#doc-textbox").innerText = event.data;
  }
}

var sendTimeout;

document.querySelector("#doc-textbox").addEventListener("input", function(event){
  event.preventDefault();

  document.querySelector("#status").innerText = "Saving…";

  if (sendTimeout) clearTimeout(sendTimeout);

  sendTimeout = setTimeout(function () {
    let contents = document.querySelector("#doc-textbox").innerText;
    connection.send(contents);
    document.querySelector("#status").innerText = "Saved.";
  }, 750);
});
