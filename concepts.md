# Concepts

- Mini queries to the database
- Wrapping blocks

## Decorators

Both services and blocks can have decorators. A decorator is an extension of the original class, with the benefit that each class can have multiple decorators. 
Decorators function as:

- around plugin (and before and after plugin)
- event handler; some event handlers only serve to modify the data of an object
- extension
- theme (both html and css can be changed by a decorator)

## Service

Cannot have state.

## Block

Can have state.

HTML and CSS are created in the same class (block).

## Page

All CSS is served along with the HTML page, as a STYLE element in the HEAD. Only the styles necessary for the page are sent.
