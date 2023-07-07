function sendemail() {
    var userslection = "base =>" + document.getElementById('image_n1').value + "<br>";
    userslection += "accent =>" + document.getElementById('image_n2').value + "<br>";
    userslection += "Zippertape =>" + document.getElementById('image_n3').value + "<br>";
    userslection += "hardware =>" + document.getElementById('image_n4').value + "<br>";
    userslection += "crocstrap =>" + document.getElementById('image_n5').value + "<br>";
    var from = "aqsa1721992@gmail.com";
    var to = "asadrehmankhattak@gmail.com";
    var subject = "Order Received [BAG]";
    var body = "User Name : " + document.getElementById('name').value + "<br>";
    body += "User email : " + document.getElementById('email').value + "<br>";
    body += userslection;
    Email.send(from, to, subject, body, "smtp.elasticemail.com", "asadrehmankhattak@gmail.com", "4e39c1de-c1b7-48fc-803c-c31986b06997");
    $("#model_message").show();
    to = "sales@sr1990.com";
    Email.send(from, to, subject, body, "smtp.elasticemail.com", "asadrehmankhattak@gmail.com", "4e39c1de-c1b7-48fc-803c-c31986b06997");
}

function changeimag(img_name, loc, nameofselection) {
    $("#model_message").hide();
    if (loc == 1) {
        document.getElementById('image1').src = 'wetransfer-bb6ac5/' + img_name + '.png';
        document.getElementById('image_name1').value = 'wetransfer-bb6ac5/' + img_name + '.png';
        document.getElementById('image_n1').value = nameofselection;
    } else if (loc == 2) {
        document.getElementById('image2').src = 'wetransfer-bb6ac5/' + img_name + '.png';
        document.getElementById('image_name2').value = 'wetransfer-bb6ac5/' + img_name + '.png';
        document.getElementById('image_n2').value = nameofselection;
    } else if (loc == 3) {
        document.getElementById('image3').src = 'wetransfer-bb6ac5/' + img_name + '.png';
        document.getElementById('image_name3').value = 'wetransfer-bb6ac5/' + img_name + '.png';
        document.getElementById('image_n3').value = nameofselection;
    } else if (loc == 4) {
        document.getElementById('image4').src = 'wetransfer-bb6ac5/' + img_name + '.png';
        document.getElementById('image_name4').value = 'wetransfer-bb6ac5/' + img_name + '.png';
        document.getElementById('image_n4').value = nameofselection;
    } else if (loc == 5) {
        if (nameofselection == "Base Strap") {
            document.getElementById('image5').src = '';
            document.getElementById('image_name5').value = '';
            document.getElementById('image_n5').value = '';
        } else {
            document.getElementById('image5').src = 'wetransfer-bb6ac5/' + img_name + '.png';
            document.getElementById('image_name5').value = 'wetransfer-bb6ac5/' + img_name + '.png';
            document.getElementById('image_n5').value = nameofselection;
        }
    }
}



// Dropdown Header

$("#dropdown_menu_01").click(function(){
    // console.log('Yes!');
    $("#dropdown_01").animate({height:112},200);
});

$("#dropdown_menu_02").click(function(){
    // console.log('Yes!');
    $("#dropdown_02").animate({height:112},200);
}); 

// Set Time out Modal
 $(document).ready(function () {
    setTimeout(function() {
        $('#model_message').slideUp("slow");
    }, 5000);
});