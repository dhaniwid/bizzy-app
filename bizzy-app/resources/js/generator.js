<script> 
    function beginner1() 
    { 
        document.getElementById("result1").value = ""; 
        let stars = document.getElementById("input1").value; 
        let blankspace = 0;

        for (y = 1; y <= stars; y++) {
            blankspace = stars - y;
            for (i = 1; i <= stars; i++) {
                // print blankspace and *
                while (blankspace > 0) {
                    document.getElementById("result1").value += " ";
                    blankspace--;
                    i++;
                }
                document.getElementById("result1").value += "*";
            }
            document.getElementById("result1").value += "\n";
        }
    } 

    function beginner2() {
        document.getElementById("result2").value = ""; 
        let stars = document.getElementById("input2").value; 
        for (x = 1; x <= stars; x++) {
            if (x==1 || x==stars) {
                for (y = 1; y <= stars; y++) {
                    document.getElementById("result2").value += "*";
                }
                document.getElementById("result2").value += "\n";
            } else {
                for (y = 1; y <= stars; y++) {
                    if (y == 1 || y == stars) {
                        document.getElementById("result2").value += "*";
                    } else {
                        document.getElementById("result2").value += " ";
                    }
                }
                document.getElementById("result2").value += "\n";
            }
        }
    }

    function adv1() {
        document.getElementById("result3").value = ""; 
        let stars = document.getElementById("input3").value; 
        let median = stars % 2 == 1 ? (Math.floor(stars/2+1)) : (stars/2) ;
        console.log(median);
        // initial blankspace
        let left = 0;
        let right = 0;
        let totalBlank = 0;
        let curStars = 0;
        
        // loop for each row ==> top row
        for (row = 1; row <= median; row++) {
            left = median-row;
            right = median-row;                    
            totalBlank = left+right;
            curStars = stars-totalBlank;
            // loop for each column
            // print blankspace
            while (left > 0 ) {
                document.getElementById("result3").value += " ";
                left--;
            }
            for (col = 0; col < curStars; col++) {
                // print the stars
                document.getElementById("result3").value += "*";
            }
            // print blankspace
            while (right > 0 ) {
                document.getElementById("result3").value += " ";
                right--;
            }
            document.getElementById("result3").value += "\n";                    
        }

        // loop for each row ==> bottom row
        for (row = median; row > 0; row--) {
            // loop for each column
            // print blankspace
            left = median-row;
            right = median-row;                    
            totalBlank = left+right;
            curStars = stars-totalBlank;                  
            
            while (left > 0) {
                document.getElementById("result3").value += " ";
                left--;
            }
            for (col = 0; col < curStars; col++) {
                // print the stars
                document.getElementById("result3").value += "*";
            }
            // print blankspace
            while (right > 0) {
                document.getElementById("result3").value += " ";
                right--;
            }
            
            document.getElementById("result3").value += "\n";
        }
    }

    function adv2() {
        // Fibonacci
        document.getElementById("result4").value = ""; 
        let total = document.getElementById("input4").value; 
        let prev = 0, next = 0, current = 0;
        // loop through the total value
        while ((current + prev) < total) {
            if (current == 0){
                document.getElementById("result4").value += 1;
                document.getElementById("result4").value += "\n";
                current = 1;
                continue;
            }
            next = current + prev;
            document.getElementById("result4").value += next;
            document.getElementById("result4").value += "\n";
            prev = current;
            current = next;
        }
    }
</script> 