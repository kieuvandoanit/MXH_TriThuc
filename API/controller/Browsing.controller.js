exports.duyetpostcomment = async(req, res) => {
    arr = ['dm','đảng yếu kém', 'chó', 'đầu buồi', 'dkm'];
    title = req.body.title;
    description = req.body.description;
    flag = 0;
    res.setHeader('Context-type', 'text/html');
    
    for(i = 0; i < arr.length; i++) {
        if(title.search(arr[i]) != -1){
            res.send(false);
        }
    }
    for(i = 0; i < arr.length; i++) {
        if(description.search(arr[i]) != -1){
            res.send(false);
        }
    }
    res.send(true);
}