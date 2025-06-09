(()=>{
    
   function gateWay(){
        let a1 = 34;

        a1 += a1*2;

        alert(`the increment by 1 is : ${a1}`);
    }

    function switchCaseFun(){
        // alert('switchCase Function');
        var month = 13;

        switch(month){
            case 1:
                document.write("January");
                break;
            case 2:
                document.Write('February');
                break;
            case 3:
                document.Write('March');
                break;
            case 4:
                document.Write('April');
                break;
            case 5:
                document.Write('May');
                break;
            case 6:
                document.Write('June');
                break;
            case 7:
                document.Write('July');
                break;
            case 8:
                document.Write('August');
                break;
            case 9:
                document.Write('September');
                    break;
            case 10: 
                document.Write('October');
                    break;
            case 11:
                document.Write('November');
                    break;
            case 12: 
                document.Write('December');
                    break;
            default : 
                document.write('Wrong Input');
        }
    }


    function forLoopFxn(){
        let x;

        for(x = 0; x < 5; x++)
            console.log(`for loop value is: ${x}`);
    }

    function whileLoopFxn(){
        let x = 1;
        while(x <= 5){
            console.log(`iwhile loop value is: ${x}`);
            x++;
        }
    }

    function doWhileLoopFxn(){
        let x = 5;
        do{
             console.log(`do while value is: ${x}`);
            x++;
        }
        while(x<10);
    }
    
   
    gateWay();
    switchCaseFun();
    forLoopFxn();
    whileLoopFxn();
    doWhileLoopFxn();
})()