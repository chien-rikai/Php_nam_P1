/* Begin: Function show menu */
function show_menu()
{
    var obj_menu_dropdown = document.getElementById("menu_dropdown");
    if(obj_menu_dropdown.style.display == "none")
    {
        obj_menu_dropdown.style.display = "block";
    }else{
        obj_menu_dropdown.style.display = "none";
    }
}
/* End: Function show menu */

/* Begin: Function show language */
function show_language()
{
    var obj_lang_dropdown = document.getElementById("lang_dropdown");
    if(obj_lang_dropdown.style.display == "none")
    {
        obj_lang_dropdown.style.display = "block";
    }else{
        obj_lang_dropdown.style.display = "none";
    }
}
/* End: Function show language */

function rating(star)
{
    switch (star) {
        case 1:
            document.getElementById('rating_1').style.color = "yellow";
            break;
        case 2:
            document.getElementById('rating_1').style.color = "yellow";
            document.getElementById('rating_2').style.color = "yellow";
            break;
        case 3:
            document.getElementById('rating_1').style.color = "yellow";
            document.getElementById('rating_2').style.color = "yellow";
            document.getElementById('rating_3').style.color = "yellow";
            break;
        case 4:
            document.getElementById('rating_1').style.color = "yellow";
            document.getElementById('rating_2').style.color = "yellow";
            document.getElementById('rating_3').style.color = "yellow";
            document.getElementById('rating_4').style.color = "yellow";
            break;
        case 5:
            document.getElementById('rating_1').style.color = "yellow";
            document.getElementById('rating_2').style.color = "yellow";
            document.getElementById('rating_3').style.color = "yellow";
            document.getElementById('rating_5').style.color = "yellow";
            break;
                
        default:
            document.getElementById('rating_1').style.color = "white";
            document.getElementById('rating_2').style.color = "white";
            document.getElementById('rating_3').style.color = "white";
            document.getElementById('rating_5').style.color = "white";
            break;
    }
    //alert("Đánh gia : "+star+" sao");
}