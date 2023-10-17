import fs from "fs"
const http = require("http");

const home = fs.readFileSync("./index.html");
console.log(home);
const server = http.createServer((req,res)=>{
    if(req.url === "/"){
        res.end(home);
}
});
server.listen(5000,() => {
    console.log("server is working")
});