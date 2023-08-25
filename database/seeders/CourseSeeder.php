<?php

namespace Database\Seeders;

use App\Models\Test;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Questions;
use App\Models\UserCourse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test = Test::create([
            'name' => 'Fundamental Vue JS Unit Test',
            'min_score' => 70
        ]);

        // Question 1
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is Vue.js?',
            'option1' => 'A JavaScript framework for building user interfaces.',
            'option2' => 'A programming language for server-side development.',
            'option3' => 'A library for creating 3D graphics.',
            'option4' => 'An advanced text editor.',
            'answer' => 'A JavaScript framework for building user interfaces.'
        ]);

        // Question 2
        Questions::create([
            'test_id' => $test->id,
            'content' => 'Which directive is used to bind data to an HTML element\'s text content?',
            'option1' => 'v-text',
            'option2' => 'v-bind',
            'option3' => 'v-model',
            'option4' => 'v-html',
            'answer' => 'v-text'
        ]);

        // Question 3
        Questions::create([
            'test_id' => $test->id,
            'content' => 'In Vue.js, which lifecycle hook is called after an instance is created?',
            'option1' => 'created',
            'option2' => 'mounted',
            'option3' => 'updated',
            'option4' => 'destroyed',
            'answer' => 'created'
        ]);

        // Question 4
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What does the "v-bind" directive do in Vue.js?',
            'option1' => 'Binds a class to an element.',
            'option2' => 'Binds an attribute to an element.',
            'option3' => 'Binds an event listener to an element.',
            'option4' => 'Binds a computed property to an element.',
            'answer' => 'Binds an attribute to an element.'
        ]);

        // Question 5
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the purpose of "v-model" directive in Vue.js?',
            'option1' => 'It defines a method in the Vue instance.',
            'option2' => 'It creates a new component.',
            'option3' => 'It binds an input element to a data property.',
            'option4' => 'It triggers a transition animation.',
            'answer' => 'It binds an input element to a data property.'
        ]);

        // Question 6
        Questions::create([
            'test_id' => $test->id,
            'content' => 'How can you conditionally render an element in Vue.js?',
            'option1' => 'Using the "v-show" directive.',
            'option2' => 'Using the "v-if" directive.',
            'option3' => 'Using the "v-for" directive.',
            'option4' => 'Using the "v-bind" directive.',
            'answer' => 'Using the "v-if" directive.'
        ]);

        // Question 7
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the purpose of the "v-for" directive in Vue.js?',
            'option1' => 'It creates a new Vue instance.',
            'option2' => 'It binds an attribute to an element.',
            'option3' => 'It binds a class to an element.',
            'option4' => 'It iterates over a data array and generates content.',
            'answer' => 'It iterates over a data array and generates content.'
        ]);

        // Question 8
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the "computed" property in Vue.js?',
            'option1' => 'A method for performing complex calculations.',
            'option2' => 'A property that returns a value based on reactive data.',
            'option3' => 'A way to define event listeners in components.',
            'option4' => 'A built-in filter for transforming data.',
            'answer' => 'A property that returns a value based on reactive data.'
        ]);

        // Question 9
        Questions::create([
            'test_id' => $test->id,
            'content' => 'Which of the following is true about Vue.js components?',
            'option1' => 'Components can only communicate through props and events.',
            'option2' => 'Components cannot have their own state.',
            'option3' => 'Components are reusable and can have their own state and behavior.',
            'option4' => 'Components are only used for styling purposes.',
            'answer' => 'Components are reusable and can have their own state and behavior.'
        ]);

        // Question 10
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the purpose of the "v-on" directive in Vue.js?',
            'option1' => 'It binds an attribute to an element.',
            'option2' => 'It defines a method in the Vue instance.',
            'option3' => 'It triggers an event listener.',
            'option4' => 'It performs data binding.',
            'answer' => 'It triggers an event listener.'
        ]);

        $course = Course::create([
            'test_id' => $test->id,
            'title' => 'Fundamental of Vue JS',
            'description' => 'About this course
            Modern web apps require increasingly complicated front-ends that can handle large amounts of user interactions and dynamic data. For example, Instagram has over 95 million new posts added per day. Front-end frameworks are JavaScript libraries that make it easy to write the code to create and display this enormous amount of data.
            
            There are many popular front-end frameworks used by engineers today, including React and Angular. Vue.js is an up-and-coming front-end framework that aims to combine the best aspects of all of these frameworks in one easy-to-use package. In fact, in the 2018 State of JavaScript survey, Vue.js was the most sought after front-end framework by a landslide, with 46.6% of all front-end developers saying that they want to learn it.
            
            In short, Vue.js makes front-end web development easier and more exciting than it’s ever been. Jump in and find out what this front-end engineering trend is all about!',
            'total_lessons' => 4,
            'level' => 'beginner',
            'image' => 'course-pictures/vue-cover-1.jpg',
            'is_published' => 1
        ]);
        
        // Lesson 1
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Getting Started with Vue.js',
            'body' => '<p>Welcome to Introduction to Vue! In this lesson, we will cover some of the most exciting features of Vue, discuss how they have changed the world of web development, and see why Vue has become the popular front-end framework that it is today.</p>
                       <p>Before all of that, though, there is one preliminary question we’re excited to answer. Perhaps you have heard Vue referred to as a “front-end framework.” But what is a front-end framework? And, for that matter, what is a front-end? Well, we’ve prepared a video to answer these important questions once and for all!</p>',
            'order' => 1
        ]);
        
        // Lesson 2
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Vue.js Basics: Directives and Data Binding',
            'body' => '<p>In this lesson, we will dive into the basics of Vue.js. Directives are special markers in the DOM that tell Vue to do something to a DOM element. One of the most common directives is v-bind, which allows you to bind an attribute to an expression. We’ll also explore v-model, which enables two-way data binding between form input and app state.</p>
                       <p>Furthermore, you’ll learn about v-for to iterate over arrays and objects and generate dynamic content. This lesson will give you a solid foundation in using Vue.js directives and data binding to create interactive and responsive user interfaces.</p>',
            'order' => 2
        ]);
        
        // Lesson 3
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Working with Components in Vue.js',
            'body' => '<p>Components are a fundamental concept in Vue.js. In this lesson, we will explore how to create and use components to build modular and reusable user interface elements. Components encapsulate both the UI and the behavior of a part of the page, making your code more organized and maintainable.</p>
                       <p>You’ll learn how to define components and pass data to them using props, which allow parent components to communicate with child components. We’ll also cover component lifecycles, enabling you to perform actions at specific stages of a component’s existence.</p>
                       <p>As you progress through this lesson, you’ll see how components improve the structure and reusability of your Vue.js applications.</p>',
            'order' => 3
        ]);

        // Lesson 4
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Preparing for the Vue.js Test',
            'body' => '<p>Before you take the Vue.js test, let’s review the concepts covered in the previous lessons. You have learned about Vue.js basics, directives, data binding, and working with components. These concepts are essential for building dynamic and interactive web applications using Vue.js.</p>
                       <p>As you get ready for the test, make sure to go through the lessons and exercises again to reinforce your understanding. Pay attention to how directives, data binding, and components work together to create a seamless user experience.</p>
                       <p>Remember to think critically and analyze each question carefully. Take your time to select the best answers based on what you have learned in the course. Once you feel confident in your understanding of Vue.js fundamentals, you’re ready to tackle the test and demonstrate your knowledge!</p>',
            'order' => 4
        ]);

        // React seeder
        $test = Test::create([
            'name' => 'Introduction to React JS Unit Test',
            'min_score' => 70
        ]);

        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is React JS used for?',
            'option1' => 'Server-side scripting',
            'option2' => 'Building user interfaces',
            'option3' => 'Database management',
            'option4' => 'Creating 3D games',
            'answer' => 'Building user interfaces'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'Which company developed React JS?',
            'option1' => 'Google',
            'option2' => 'Facebook',
            'option3' => 'Microsoft',
            'option4' => 'Apple',
            'answer' => 'Facebook'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the virtual DOM in React?',
            'option1' => 'A separate JavaScript file for DOM manipulation',
            'option2' => 'A lightweight version of the browser\'s DOM',
            'option3' => 'A virtual environment for testing',
            'option4' => 'A concept used for building real-time applications',
            'answer' => 'A lightweight version of the browser\'s DOM'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is a component in React?',
            'option1' => 'A function that prints text on the screen',
            'option2' => 'A reusable piece of user interface',
            'option3' => 'A separate HTML file',
            'option4' => 'A database table',
            'answer' => 'A reusable piece of user interface'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'How can you create components in React?',
            'option1' => 'Using HTML and CSS only',
            'option2' => 'Using PHP scripts',
            'option3' => 'Using JavaScript functions',
            'option4' => 'Using SQL queries',
            'answer' => 'Using JavaScript functions'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the purpose of state in React?',
            'option1' => 'To store data locally within a component',
            'option2' => 'To communicate with external APIs',
            'option3' => 'To manage database connections',
            'option4' => 'To define the structure of a component',
            'answer' => 'To store data locally within a component'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is a prop in React?',
            'option1' => 'A reserved keyword in JavaScript',
            'option2' => 'A built-in HTML element',
            'option3' => 'An object that stores component\'s state',
            'option4' => 'An attribute passed to a component',
            'answer' => 'An attribute passed to a component'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the purpose of rendering in React?',
            'option1' => 'To create animations',
            'option2' => 'To update the DOM with new data',
            'option3' => 'To validate user input',
            'option4' => 'To manage server requests',
            'answer' => 'To update the DOM with new data'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the significance of keys in React lists?',
            'option1' => 'They provide unique names for components',
            'option2' => 'They help in styling components',
            'option3' => 'They improve component performance',
            'option4' => 'They ensure proper alignment of components',
            'answer' => 'They improve component performance'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'Which lifecycle method is called after a component is rendered?',
            'option1' => 'componentDidMount',
            'option2' => 'componentWillUnmount',
            'option3' => 'componentShouldUpdate',
            'option4' => 'componentDidUpdate',
            'answer' => 'componentDidMount'
        ]);

        $course = Course::create([
            'test_id' => $test->id,
            'title' => 'Introduction to React JS',
            'description' => "<p>Welcome to the 'Introduction to React JS' course! Are you ready to dive into the world of modern web development? This course is designed to give you a solid foundation in using React, one of the most popular JavaScript libraries for building user interfaces.</p>
            <p>In this course, we will explore the fundamentals of React JS and discover how it revolutionizes the way we create interactive and dynamic web applications. Whether you're a beginner or an experienced developer, this course will provide you with the knowledge and skills needed to harness the power of React.</p>
            <p>Throughout the course, you'll learn about the key concepts that make React unique, including components, the virtual DOM, state management, and props. We'll guide you through hands-on projects and practical examples, helping you apply what you've learned to real-world scenarios.</p>
            <p>By the end of this course, you'll have a deep understanding of React's principles and be able to build responsive and feature-rich web applications. Join us on this journey to unlock the potential of React JS and take your web development skills to the next level.</p>
            <p>Get ready to create stunning user interfaces and deliver exceptional user experiences with the 'Introduction to React JS' course. Enroll now and embark on an exciting learning adventure in the world of React!</p>",
            'total_lessons' => 7,
            'level' => 'beginner',
            'image' => 'course-pictures/react-cover-1.png',
            'is_published' => 1
        ]);

        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Getting Started with React JS',
            'body' => '<p>Welcome to the world of React JS! In this lesson, we will introduce you to the fundamentals of React and help you set up your development environment. You will learn how to create your first React component, understand JSX syntax, and see how React works behind the scenes.</p>',
            'order' => 1
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Components and Props',
            'body' => '<p>Components are the building blocks of React applications. In this lesson, we will dive deeper into creating and using components. You will also discover how to pass data between components using props, enabling you to build dynamic and reusable user interfaces.</p>',
            'order' => 2
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'State and Lifecycle',
            'body' => '<p>Understanding state and lifecycle is crucial in React development. In this lesson, we will explore how to manage component state and use lifecycle methods to control the behavior of your components. You will learn how to create interactive and responsive UIs that update in real-time.</p>',
            'order' => 3
        ]);

        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Handling Events',
            'body' => '<p>Interactivity is a core aspect of web applications. In this lesson, you will discover how to handle user events in React. We will cover event handling and binding, allowing you to create user-friendly interfaces that respond to user actions.</p>',
            'order' => 4
        ]);

        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Forms and Controlled Components',
            'body' => '<p>Building forms is a common task in web development. In this lesson, you will learn how to create controlled components in React. We will explore how to manage form data and validation, ensuring a smooth and reliable user input experience.</p>',
            'order' => 5
        ]);

        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Styling in React',
            'body' => '<p>Styling is an essential part of creating visually appealing applications. In this lesson, we will discuss different approaches to styling React components. You will learn about CSS-in-JS libraries, CSS modules, and other techniques to make your components look great.</p>',
            'order' => 6
        ]);

        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Routing and Navigation',
            'body' => '<p>Creating multi-page applications requires effective routing and navigation. In this lesson, we will introduce you to React Router, a popular library for handling navigation in React. You will learn how to set up routes and create dynamic navigation menus.</p>',
            'order' => 7
        ]);

        // laravel course
        $test = Test::create([
            'name' => 'Laravel for Beginner Unit Test',
            'min_score' => 70
        ]);

        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is Laravel?',
            'option1' => 'A programming language.',
            'option2' => 'A front-end framework.',
            'option3' => 'A back-end framework.',
            'option4' => 'A database management system.',
            'answer' => 'A back-end framework.'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'Which artisan command is used to create a new Laravel project?',
            'option1' => 'php artisan new',
            'option2' => 'php artisan create',
            'option3' => 'laravel new',
            'option4' => 'composer new laravel',
            'answer' => 'laravel new'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the default database driver used by Laravel?',
            'option1' => 'SQLite',
            'option2' => 'MySQL',
            'option3' => 'PostgreSQL',
            'option4' => 'MongoDB',
            'answer' => 'SQLite'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the purpose of Eloquent in Laravel?',
            'option1' => 'To handle HTTP requests and responses.',
            'option2' => 'To manage and interact with databases using an active record implementation.',
            'option3' => 'To create user interfaces.',
            'option4' => 'To optimize website performance.',
            'answer' => 'To manage and interact with databases using an active record implementation.'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'Which route method is used to define a resourceful route in Laravel?',
            'option1' => 'get',
            'option2' => 'post',
            'option3' => 'resource',
            'option4' => 'any',
            'answer' => 'resource'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the purpose of migrations in Laravel?',
            'option1' => 'To create views for the frontend.',
            'option2' => 'To manage the database schema and perform database changes in a version-controlled manner.',
            'option3' => 'To handle user authentication.',
            'option4' => 'To define routes for the application.',
            'answer' => 'To manage the database schema and perform database changes in a version-controlled manner.'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'Which of the following is NOT a type of relationship available in Eloquent?',
            'option1' => 'One-to-One',
            'option2' => 'One-to-Many',
            'option3' => 'Many-to-Many',
            'option4' => 'One-to-None',
            'answer' => 'One-to-None'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'Which Blade directive is used to include the content of a sub-view?',
            'option1' => '@section',
            'option2' => '@extends',
            'option3' => '@yield',
            'option4' => '@include',
            'answer' => '@include'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the purpose of middleware in Laravel?',
            'option1' => 'To create dynamic menus for the frontend.',
            'option2' => 'To manage authentication and authorization for routes.',
            'option3' => 'To store user session data.',
            'option4' => 'To optimize database queries.',
            'answer' => 'To manage authentication and authorization for routes.'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'Which artisan command is used to generate a new migration?',
            'option1' => 'php artisan generate:migration',
            'option2' => 'php artisan create:migration',
            'option3' => 'php artisan make:migration',
            'option4' => 'php artisan new:migration',
            'answer' => 'php artisan make:migration'
        ]);

        $course = Course::create([
            'test_id' => $test->id,
            'title' => 'Laravel for Beginner',
            'description' => "<p>Welcome to the Laravel for Beginners course! Whether you\'re new to web development or looking to enhance your skills, this course is designed to introduce you to the world of Laravel, a powerful PHP framework.</p>
            <p>In this course, you\'ll learn the fundamentals of Laravel, starting from setting up your development environment to building web applications with ease. We\'ll cover topics such as routing, database management, Eloquent ORM, Blade templating, and more.</p>
            <p>By the end of this course, you\'ll have a strong foundation in Laravel development and be ready to create dynamic and feature-rich web applications. Get ready to embark on your journey to becoming a skilled Laravel developer!</p>",
            'total_lessons' => 7,
            'level' => 'beginner',
            'image' => 'course-pictures/laravel-cover-1.jpg',
            'is_published' => 1
        ]);

        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Introduction to Laravel',
            'body' => "<p>Welcome to the 'Laravel for Beginners' course! In this lesson, we'll provide an overview of what Laravel is and why it's such a popular PHP framework. We'll also discuss the key features and benefits that Laravel offers for web development.</p>",
            'order' => 1
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Setting Up Your Development Environment',
            'body' => "<p>Before we dive into Laravel, it's important to set up your development environment. In this lesson, we'll guide you through the process of installing and configuring Laravel on your local machine. You'll learn about Composer, Laravel Installer, and Homestead.</p>",
            'order' => 2
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Routing and Controllers',
            'body' => "<p>In this lesson, we'll explore the basics of routing and controllers in Laravel. You'll learn how to define routes, create controllers, and handle different HTTP methods. We'll also discuss how to pass data to views from controllers.</p>",
            'order' => 3
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Database Management with Eloquent',
            'body' => "<p>Laravel provides the powerful Eloquent ORM for database management. In this lesson, we'll cover how to define models, create migrations, and perform common database operations using Eloquent. You'll learn about relationships, querying, and more.</p>",
            'order' => 4
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Blade Templating Engine',
            'body' => "<p>Blade is Laravel's powerful templating engine that makes it easy to create dynamic views. In this lesson, we'll dive into Blade syntax, including template inheritance, control structures, and partials. You'll learn how to create flexible and reusable views.</p>",
            'order' => 5
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'User Authentication and Authorization',
            'body' => "<p>In this lesson, we'll cover user authentication and authorization in Laravel. You'll learn how to implement user registration, login, and password reset functionality. We'll also explore how to restrict access to certain routes based on user roles and permissions.</p>",
            'order' => 6
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Creating RESTful APIs',
            'body' => "<p>RESTful APIs are essential for building modern web applications. In this lesson, we'll show you how to create RESTful APIs using Laravel's built-in tools. You'll learn about API routes, controllers, request validation, and how to handle API responses.</p>",
            'order' => 7
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Testing Your Laravel Applications',
            'body' => "<p>Testing is a crucial part of web development. In this lesson, we'll cover how to write tests for your Laravel applications using PHPUnit. You'll learn about testing routes, controllers, models, and how to ensure your code is robust and error-free.</p>",
            'order' => 8
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Course Material Preview',
            'body' => "<p>Before you proceed with the lessons, let's take a quick preview of the course material. You'll learn about routing, database management, Eloquent ORM, Blade templating, authentication, creating APIs, and testing. Get ready to embark on a journey to becoming a skilled Laravel developer!</p>",
            'order' => 9
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Preparing for the Laravel Test',
            'body' => "<p>Before you take the Laravel test, let's review the concepts covered in the previous lessons. You've learned about Laravel basics, setting up your environment, routing, database management, Blade templating, authentication, creating APIs, and testing. These concepts are essential for building web applications using Laravel.</p>
                       <p>As you get ready for the test, make sure to revisit the lessons and exercises to reinforce your understanding. Pay attention to how different concepts work together to create robust applications.</p>
                       <p>Remember to think critically and analyze each question carefully.",
            'order' => 10
        ]);

        // advanced vue js
        $test = Test::create([
            'name' => 'Advanced Vue JS',
            'min_score' => 80
        ]);

        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is Vuex in Vue.js?',
            'option1' => 'A state management pattern for Vue.js applications.',
            'option2' => 'A popular JavaScript framework for building web applications.',
            'option3' => 'A styling library for creating responsive designs.',
            'option4' => 'A server-side rendering technique for Vue.js.',
            'answer' => 'A state management pattern for Vue.js applications.'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the purpose of Vue Router?',
            'option1' => 'To manage application state in Vue.js.',
            'option2' => 'To handle HTTP requests in Vue.js.',
            'option3' => 'To manage routing and navigation in Vue.js applications.',
            'option4' => 'To create interactive user interfaces in Vue.js.',
            'answer' => 'To manage routing and navigation in Vue.js applications.'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What are mixins in Vue.js?',
            'option1' => 'A feature that allows you to create custom HTML elements.',
            'option2' => 'Reusable JavaScript functions that can be injected into Vue components.',
            'option3' => 'A method for including external CSS styles in Vue components.',
            'option4' => 'A way to define global variables in Vue applications.',
            'answer' => 'Reusable JavaScript functions that can be injected into Vue components.'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is dynamic component rendering in Vue.js?',
            'option1' => 'A technique for optimizing rendering performance in Vue applications.',
            'option2' => 'The process of automatically updating the DOM in response to data changes.',
            'option3' => 'A way to render components based on conditions or user interactions.',
            'option4' => 'The use of JavaScript frameworks for rendering 3D graphics.',
            'answer' => 'A way to render components based on conditions or user interactions.'
        ]);
        
        Questions::create([
            'test_id' => $test->id,
            'content' => 'What is the purpose of the Vue.js transition system?',
            'option1' => 'To add animation effects to Vue components.',
            'option2' => 'To enhance the security of Vue applications.',
            'option3' => 'To manage the state of Vue components.',
            'option4' => 'To handle asynchronous operations in Vue.js.',
            'answer' => 'To add animation effects to Vue components.'
        ]);
        
        $course = Course::create([
            'test_id' => $test->id,
            'title' => 'Advanced Vue JS',
            'description' => "<p>Take your Vue.js skills to the next level with our Advanced Vue.js Course. This course is designed for developers who have a solid understanding of Vue.js fundamentals and want to explore more advanced topics to build dynamic and complex web applications.</p>
            <p>In this course, you'll dive into advanced state management using Vuex, a powerful state management pattern. You'll learn how to handle asynchronous operations, implement advanced routing and navigation using Vue Router, and create dynamic user interfaces with custom directives and transitions.</p>
            <p>Our experienced instructors will guide you through real-world projects and use cases, helping you master complex concepts such as server-side rendering, code splitting, and lazy loading. You'll also explore techniques for optimizing performance, securing your Vue.js applications, and integrating third-party libraries.</p>
            <p>By the end of this course, you'll be equipped with the skills and knowledge to build sophisticated Vue.js applications that deliver seamless user experiences and leverage the full potential of this versatile front-end framework.</p>",
            'total_lessons' => 7,
            'level' => 'beginner',
            'image' => 'course-pictures/vue-cover-2.webp',
            'is_published' => 1
        ]);

        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Advanced State Management with Vuex',
            'body' => "<p>In this lesson, you'll dive deep into advanced state management using Vuex. You'll learn how to organize and modularize your Vuex store, handle complex state mutations, and implement advanced features like plugins and strict mode.</p>",
            'order' => 1,
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Asynchronous Operations with Vue.js',
            'body' => '<p>Building on your foundational knowledge, this lesson will teach you how to handle asynchronous operations in Vue.js. You\'ll explore async/await, Promises, and the Vue Composition API to efficiently manage asynchronous code in your applications.</p>',
            'order' => 2,
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Advanced Routing and Navigation with Vue Router',
            'body' => '<p>Vue Router is a key part of building complex applications. In this lesson, you\'ll learn advanced routing techniques, including nested routes, route guards, and navigation hooks. You\'ll also explore dynamic routing and lazy loading for optimal performance.</p>',
            'order' => 3,
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Advanced Component Patterns',
            'body' => '<p>Take your Vue.js components to the next level with advanced patterns. This lesson covers component communication techniques, such as props and custom events. You\'ll also explore higher-order components (HOCs), mixins, and renderless components for reusability and maintainability.</p>',
            'order' => 4,
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Advanced Vue Directives and Custom Directives',
            'body' => '<p>Vue.js provides a powerful set of directives. In this lesson, you\'ll explore advanced uses of directives like v-once, v-cloak, and v-pre. You\'ll also learn how to create your own custom directives to extend Vue\'s functionality according to your application\'s needs.</p>',
            'order' => 5,
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Advanced Forms and Validation',
            'body' => '<p>Building complex forms? This lesson has you covered. You\'ll learn advanced techniques for form handling and validation using Vue.js. Dive into form components, form libraries, and dynamic form rendering, and explore methods to provide a smooth user experience.</p>',
            'order' => 6,
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Advanced Animations and Transitions',
            'body' => '<p>Enhance your Vue.js applications with advanced animations and transitions. Discover the Vue Transition system and explore complex animations using libraries like GreenSock Animation Platform (GSAP). You\'ll learn to create smooth, interactive, and visually appealing user experiences.</p>',
            'order' => 7,
        ]);
        
        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Testing Vue.js Applications',
            'body' => "<p>Testing is crucial for maintaining code quality. In this lesson, you'll explore different testing methodologies and tools to ensure your Vue.js applications are reliable and bug-free. Learn about unit testing, component testing, and end-to-end testing with libraries like Jest and Vue Test Utils.</p>",
            'order' => 8,
        ]);
        
    }
}
