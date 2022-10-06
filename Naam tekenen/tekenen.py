import ssl
import turtle

t=turtle.Turtle()

t.penup
t.speed(3)
t.color("blue")
t.penup
t.begin_fill()

# h 
t.goto(1,1)
t.left(90)
t.forward(100)
t.back(50)
t.right(90)
t.forward(50)
t.left(90)
t.forward(50)
t.back(100)
t.right(90)
t.penup()
t.goto(60,1)


# e
t.pendown()
t.forward(50)
t.back(50)
t.left(90)
t.forward(50)
t.left(90)
t.back(50)
t.forward(50)
t.right(90)
t.forward(50)
t.right(90)
t.forward(50)
t.penup()
t.goto(120,1)

# n
t.pendown()
t.left(90)
t.forward(100)
t.goto(170,1)
t.forward(100)
t.right(90)
t.penup()
t.goto(180,1)

# r
t.pendown()
t.left(90)
t.forward(100)
t.right(90)
t.forward(50)
t.right(90)
t.forward(50)
t.right(90)
t.forward(50)
t.goto(230,1)
t.right(180)
t.penup()
t.goto(240,1)

# i
t.pendown()
t.left(90)
t.forward(85)
t.penup()
t.forward(5)
t.pendown()
t.forward(10)
t.penup()
t.goto(300,1)



turtle.done()