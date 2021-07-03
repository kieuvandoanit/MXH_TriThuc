const express = require('express');
const router = express.Router();

const Controller = require('../controller/Browsing.controller');


router.post('/',Controller.duyetpostcomment);

module.exports = router;