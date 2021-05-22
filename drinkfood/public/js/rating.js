function rating(value)
{
    alert("Bạn đã đánh giá: "+value + " sao");

    switch(value) 
    {
        case 1:
            document.getElementById("1").style.color = "#fff";
            break;
        case 2:
            document.getElementById("1").style.color = "#fff";
            document.getElementById("2").style.color = "#fff";
            break;
        case 3:
            document.getElementById("1").style.color = "#fff";
            document.getElementById("2").style.color = "#fff";
            document.getElementById("3").style.color = "#fff";
            break;
        case 4:
            document.getElementById("1").style.color = "#fff";
            document.getElementById("2").style.color = "#fff";
            document.getElementById("3").style.color = "#fff";
            document.getElementById("4").style.color = "#fff";
            break;
        case 5:
            document.getElementById("1").style.color = "#fff";
            document.getElementById("2").style.color = "#fff";
            document.getElementById("3").style.color = "#fff";
            document.getElementById("4").style.color = "#fff";
            document.getElementById("5").style.color = "#fff";
            break;
        default:
          // code block
    }
}