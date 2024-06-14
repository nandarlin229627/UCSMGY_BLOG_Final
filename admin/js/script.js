// confirm delete post
$(function(){
    $('.delete_link').click(function(){
        return confirm("Are You Sure You Want To Delete");
    })

})

//checkbox
$(function(){
    $('.checkAllBox').click(function(){
        if (this.checked == true) {
            $('.checkBoxes').each(function(){ //loop =each
                this.checked = true;
            })   

        }else{
            $('.checkBoxes').each(function(){ //loop =each
                this.checked = false;
            })

        }
    })
})


        

	