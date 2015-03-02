//Servo myservo;  // create servo object to control a servo
int led1 = D0;
int led2 = D1;

void setup() {
  // Initialize D0 + D7 pin as output
  // It's important you do this here, inside the setup() function rather than outside it or in the loop function.
  Spark.function("lock", lockControl);
  pinMode(led1,OUTPUT);
  pinMode(led2, OUTPUT);
  //myservo.attach(A0);
  digitalWrite(led1,LOW);
  //digitalWrite(led2,HIGH);
}

// This routine gets called repeatedly, like once every 5-15 milliseconds.
// Spark firmware interleaves background CPU activity associated with WiFi + Cloud activity with your code. 
// Make sure none of your code delays or blocks for too long (like more than 5 seconds), or weird things can happen.
/*void loop() {
digitalWrite(led1,HIGH);
}*/

int lockControl(String command)
{
   int state = 0;
 
   // find out the state of the led
   
   if(command.substring(0,2) == "ON") state = 1;
   else if(command.substring(0,3) == "OFF") state = 0;
   else return -1;

   // write to the appropriate pin
   if (state == 1)
   {
   digitalWrite(led1, HIGH);
   digitalWrite(led2,LOW);
   //myservo.write(180);
   return 0;
    }
     else if (state == 0)
            {
      digitalWrite(led2,HIGH);
      digitalWrite(led1,LOW);
      //myservo.write(0);
      return 0;
            }
}
