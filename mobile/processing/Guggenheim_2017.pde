import processing.opengl.*;        // not req'd in processingjs

PShape T;                          // T.svg has children
PShape top, left, right, bottom, logo;
float wind = 10.0;
int yoffset = 100;

void setup() {
  size(800, 800, OPENGL);
  // size(592, 592, OPENGL);          // scaled for online
  smooth();
    path = "http://dev.o-r-g.local/guggenheim/mobile/processing/data/";
  top = loadShape(path + "2.svg");
  left = loadShape(path + "0.svg");
  bottom = loadShape(path + "1.svg");
  right = loadShape(path + "7.svg");
  logo = loadShape(path + "logo.svg");
} 

void draw() {
  background(255);
  fill(0);

shape(top, 10, 10, 80, 80);

  // shape(top, 0, 0);
    
    stroke(200);
    line(0,25,width,25);

  float spin = map(mouseX, 0, width, 0.001, 0.05);
  float yaw = map(mouseY, 0, height, 1.0, 2.0);
  wind *= 1/1.001;  

  // setup
  pushMatrix();
  // scale(.73);                       // scaled for online
  
  translate(400, 30, -500);


  // top, right

  pushMatrix();
  // scale(3.0);
  rotateY(spin*yaw*100+wind);  
  // shape(top, -260, 0);
/*
  shape(top, -300, yoffset-200);
  translate(200, -10, 0);
  rotateY(spin*yaw*2.5+wind);  
  // shape(right, -260, 0);
  shape(right, -260, yoffset/1.5);
  popMatrix();


  // left

  pushMatrix();
  rotateY(spin*yaw*250+wind);  
  shape(left, -260, yoffset);
  popMatrix();

  // bottom

  pushMatrix();
  rotateY(spin*yaw*400+wind);  
  shape(bottom, -360, yoffset*3);
  popMatrix();

  // logo

  popMatrix();
  shape(logo, 10, height-30);
*/

}


void mousePressed() {

  wind *= 1.25;
}
