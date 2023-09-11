const express = require("express");
const path = require("path");
const app = express();
// tell the express app to listen on port 80 since it is the default
const server = app.listen(80, function() {
    console.log("listening on port 80");
});
const io = require('socket.io')(server);
// static content
app.use(express.static(path.join(__dirname, "./static")));
// setting up ejs and our views folder
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');
// root route to render the index.ejs view
app.get('/', function(req, res) {
    res.render("index");
})

let logs = [];
let users ={};
let circles =[];
let mouse=[];
let mouseLogs = [];

//socket
io.on('connection', function (socket) {
    let currentId = socket.id;
    socket.emit('updateUsers',logs);
    socket.emit('updateArea',circles);
    socket.on('logIn', function(person) {
        users[socket.id] = person;
        logs = listActive(users, currentId);
        socket.broadcast.emit('updateUsers')
        socket.emit('updateUsersCurr',logs)
    });
    socket.on('parseActive',function(){
        logs = listActive(users, currentId);
        socket.emit('updateUsersCurr', logs);
    });
    socket.on('write',function(entry) {
        circles += entry;
        io.emit('updateArea',circles);
    })
    socket.on('reset',function() {
        circles = "";
        io.emit('updateArea',circles);
    })
//Mouse related
    socket.on('mouseMove',function(data){
        mouse[currentId] = data;
        mouseLogs = listMouse(mouse,currentId);
        socket.broadcast.emit('refreshMouse')
    })
    socket.on('updateMouse',function(){
        mouseLogs = listMouse(mouse,currentId);
        socket.emit('mouseTracker',mouseLogs);
    })
//Disconnect
    socket.on('disconnect', function() {
        delete users[socket.id];
        delete mouse[socket.id];
        logs = listActive(users);
        socket.broadcast.emit('refreshMouse');
        socket.broadcast.emit('updateUsers',logs);
    });
});

//Functions used to process data
function listActive(users,currentId){
    let result = `<h2>Members in the room</h2>`;
    let persons = Object.values(users);
    for (let i = 0; i < persons.length; i++) {
        if(Object.keys(users)[i] == currentId){
            result += `<p>${persons[i].person} (YOU)</p>`;
        }
        else{
            result += `<p>${persons[i].person}</p>`;
        }
    }
    return result;
}

function listMouse(mouse,currentId){
    let result = "";
    for(let i = 0; i < (Object.values(mouse).length); i++){
        if(Object.keys(mouse)[i] == currentId){
        }
        else{
            result += `<span style=position:absolute;top:${Object.values(mouse)[i].y}px;left:${Object.values(mouse)[i].x}px; >&#128432; ${Object.values(mouse)[i].name}</span>`
        }
    }
    return result;
}


