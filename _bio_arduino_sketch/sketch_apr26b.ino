/*
  AnalogReadSerial
  Reads an analog input on pin 0, prints the result to the serial monitor.
  Attach the center pin of a potentiometer to pin A0, and the outside pins to +5V and ground.
 
 This example code is in the public domain.
 */

int initialValue = 0;
int sensorValue = 0;
  

// the setup routine runs once when you press reset:
void setup() {
  // initialize serial communication at 9600 bits per second:
  Serial.begin(9600);
  sensorValue = analogRead(A0);
  initialValue = sensorValue;
}

// the loop routine runs over and over again forever:
void loop() {
  // read the input on analog pin 0:
  sensorValue = analogRead(A0);
  
  if(sensorValue > initialValue + 20) {
      
      initialValue = sensorValue;
//      Serial.print("GET /th/index.php?type=temp&value=0 HTTP/1.1\r\n");
//      Serial.print("GET /th/index.php?type=nfc&value=0 HTTP/1.1\r\n");
      //temparature (temporary)
//      Serial.print("GET /th/index.php?type=temp&value=100 HTTP/1.1\r\n"); 
//      Serial.print("HOST: biotech.freevar.com\r\n\r\n"); 

      //nfc (temporary)
      Serial.print("");
      Serial.print("GET /th/index.php?type=nfc&value=100 HTTP/1.1\r\n"); 
      Serial.print("HOST: biotech.freevar.com\r\n\r\n"); 

      //spuit (temporary)
//      Serial.print("GET /th/index.php?type=spuit&value=" + String(sensorValue) + " HTTP/1.1\r\n"); 
//      Serial.print("HOST: biotech.freevar.com\r\n\r\n"); 
  }    
  
  if(sensorValue < initialValue) {
      initialValue = sensorValue;
  }    

   
  // print out the value you read:
  
  delay(1000);        // delay in between reads for stability
}

