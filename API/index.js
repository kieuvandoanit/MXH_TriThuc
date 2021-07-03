const express = require('express');
const createError = require('http-errors');
const bodyParser = require('body-parser');
const cors = require('cors');

const AutoBrowsingRouter = require('./routes/browsing.routes');


const app = express();

app.use(bodyParser.urlencoded({
    extensions:false,
}));

app.use(bodyParser.json());

app.use(cors());

app.use('/browsing',AutoBrowsingRouter);

app.use((req, res, next)=>{
    next(createError(404));
});

app.use((err, req, res)=>{
    console.log(err.stack);
    res.status(err.status || 500).send(err.message);
});

const server = app.listen(3000, ()=>{
    console.log(`API do an dang chay`);
});