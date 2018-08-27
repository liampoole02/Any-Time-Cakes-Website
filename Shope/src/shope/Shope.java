package shope;
//////////////////////Polymorphism
abstract public class Shope {

    public abstract void drawShape();

    public void colorMe() {
        System.out.println("triangle");
    }

    public static void main(String[] args) {
        Circle bx = new Circle();
        Tringle b = new Tringle();
        Rectangle x = new Rectangle();
        bx.colorMe();
        bx.drawShape();
        b.colorMe();
        b.drawShape();
        x.colorMe();
        x.drawShape();
    }

}

class Circle extends Shope {//use bulb to implement all abstract methods

    @Override
    public void drawShape() {
        System.out.println("Draw Circle");

    }

    @Override
    public void colorMe() {
        System.out.println("This circle");

    }
}

class Tringle extends Shope {

    @Override
    public void drawShape() {
        System.out.println("Draw Triangle");
    }

    @Override
    public void colorMe() {
        System.out.println("This Triangle");
    }
}

class Rectangle extends Shope {

    @Override
    public void drawShape() {
        System.out.println("Draw recatngle");

    }

    @Override
    public void colorMe() {
        System.out.println("This Rectangle");

    }
}
