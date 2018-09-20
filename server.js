const mongo = require("mongodb").MongoClient;

const url = "mongodb://skidi:mercury@dota2search-shard-00-00-odko1.mongodb.net:27017,dota2search-shard-00-01-odko1.mongodb.net:27017,dota2search-shard-00-02-odko1.mongodb.net:27017/test?ssl=true&replicaSet=Dota2Search-shard-0&authSource=admin&retryWrites=true";
const jsonFile = require("./final/final.json");
mongo.connect(url, { useNewUrlParser: true }, function(err, db) {
    if (err) throw err;
    var dbo = db.db("mydb");
    // dbo.collection("customers").insertOne(myobj, function(err, res) {
    //   if (err) throw err;
    //   console.log("1 document inserted");
    //   db.close();
    // });
    // dbo.collection("Dota2Items").insertMany(jsonFile, function(err, result) {
    //     if (err) throw err;
    //     console.log(result);
    //     db.close();
    //   });

    
    dbo.collection("Dota2Items").find({"name":/Anti/i} ,function(err, result){
        console.log(result.name);
        db.close();
    })
});