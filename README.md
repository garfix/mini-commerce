# Mini Commerce

This application is a proof-of-concept of some of the ideas I have about how to create an e-commerce system that both fast to execute and easy to develop for. It is a bit of a reaction against the heaviness of Magento 2. Some of these ideas are controversial. 

## Services and Blocks

The system is not based on MVC, but on Services and Blocks. The services provide the business logic; the blocks the user interface.

The blocks are hierarchical and have state. Each block is responsible for a piece of HTML and its CSS. Blocks reside the int Block directory.

The services do not have state. They reside in the Service and Api directories. The signatures of the Api services are more stable (they should not change).  

## Decorators as an extension system    

Both services and blocks can be extended by third-party extensions. 

I used the [decorator pattern](https://en.wikipedia.org/wiki/Decorator_pattern) to establish this. A decorator is an extension of the original class, with the benefit that each class can have multiple decorators. 

Decorators function as:

- around plugin
- class extension
- part of a theme (both html and css can be changed by a decorator)

## Setup

The module setup consists of a number of classes called Setup1, Setup2 etc. The database holds the latest version number that has been executed.  

## Model

In case you are wondering where is the model. There is no model. Traditionally the model contains the business logic involved in a single entity. But this is a bad idea, since the business logic only increases in size and so does this class. More importantly, an entity should not be considered to have a fixed amount of attributes. The attributes can come and go. No model class should limit this freedom.

There is also no resource model. All data is retrieved from the database directly. This is what any developer wants, in the end, so why not give it to them?

This means that you cannot _load the model_. This takes away one of the major causes of slow webshops: heavy models and loading all data when only a small part of it is needed. 

## Context

The system does not use dependency injection, but rather an Ambient Context to hold the system-wide dependencies of the system: DB, log, Request, etc. 

## Database

The database contains only entity tables and entity-attribute tables. An entity table contains only a single entity-id column. An entity-attribute table contains two columns: an entity-id column and an attribute-value column. Let's call this an EV model, as opposed to EAV. This means that an attribute can be added easily without having to change existing code.

So there are many tables; each consisting of a single attribute. You may think: this means lot of joins. The opposite is the case: no joins are allowed in the DB class. The idea is that to keep database queries lightweight, it is ok if there are many, but they must be extremely simple. 

A side effect of this approach is that all queries are built in a single class, DB. No other query builders exist. And, although it does not matter to me, this means that, yes, the database can in fact be replaced by any other database; just like that.

## The module class

Each module and extension has a module class. This class provides access to the rest of the classes in the module.

## Routers and Request Handler

The module may specify a router. A router is a class that determines what to do with a URL. It picks a request handler that builds the response. Request handlers reside in the Controller directory.

## Translation

I use class constants to specify translations. This way the translations do not need to be loaded; they are there at compilation time. Also, since a source is a constant, the full power of the IDE can be unleashed on it to see where the it is used; and which translations are present.
