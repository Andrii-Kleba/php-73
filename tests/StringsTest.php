<?php

use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    /**
     * @see https://www.php.net/manual/en/language.types.string.php
     */
    public function testVariableParsing()
    {
        $foo = 'world';

        // Double quotes.
        $this->assertEquals('Hello world', "Hello $foo");

        // Single quotes.
        $this->assertEquals('Hello $foo', 'Hello $foo');

        //  "Hello ${foo}"
        $this->assertEquals('Hello world', "Hello ${foo}");

        // "Hello " . $foo
        $this->assertEquals('Hello world', "Hello " . $foo);

        //  Heredoc
        $foo = <<<EOT
        Hello world 
        EOT;
        $this->assertEquals('Hello world ', $foo);

        // Nowdoc
        $foo = <<<'EOT'
        Hello world 
        EOT;
        $this->assertEquals('Hello world ', $foo);
    }

    /**
     * @see https://www.php.net/manual/en/ref.strings.php
     */
    public function testStringFunctions()
    {
        // trim — Strip whitespace (or other characters) from the beginning and end of a string
        $this->assertEquals('Hello', trim('Hello         '));
        $this->assertEquals('Hello', trim('Hello......', '.'));

        // ltrim — Strip whitespace (or other characters) from the beginning of a string
        $this->assertEquals('Hello', ltrim('      Hello'));

        // rtrim — Strip whitespace (or other characters) from the end of a string
        $this->assertEquals('Hello', rtrim('Hello           '));

        // strtoupper — Make a string uppercase
        $this->assertEquals('HELLO', strtoupper('hello'));

        // strtolower — Make a string lowercase
        $this->assertEquals('hello', strtolower('HeLlO'));

        // ucfirst — Make a string's first character uppercase
        $this->assertEquals('Hello', ucfirst('hello'));

        // lcfirst — Make a string's first character lowercase
        $this->assertEquals('hello', lcfirst('Hello'));

        // strip_tags — Strip HTML and PHP tags from a string
        $this->assertEquals('Hello', strip_tags('<a>Hello</a>'));

        // htmlspecialchars — Convert special characters to HTML entities
        $this->assertEquals('&lt;b&gt;Hello&lt;/b&gt;', htmlspecialchars('<b>Hello</b>'));

        // addslashes — Quote string with slashes
        $this->assertEquals("He\'llo", addslashes("He'llo"));

        // strcmp — Binary safe string comparison
        $this->assertEquals(0, strcmp('hello', 'hello'));

        // strncasecmp — Binary safe case-insensitive string comparison of the first n characters
        $this->assertEquals(0, strncasecmp('hel', 'hello', 2));

        // str_replace — Replace all occurrences of the search string with the replacement string
        $this->assertEquals('hello World', str_replace('Hellllllo', 'hello', 'Hellllllo World'));

        // strpos — Find the position of the first occurrence of a substring in a string
        $this->assertEquals(8, strpos('Hello World', 'r'));

        // strstr — Find the position of the first occurrence of a substring in a string
        $this->assertEquals('world', strstr('Hello world', 'world'));

        // strrchr — Find the last occurrence of a character in a string
        $this->assertEquals('orld', strrchr('Hello world', 'o'));

        // substr — Return part of a string
        $this->assertEquals('llo worl', substr('Hello world', 2, 8));

        // sprintf — Return a formatted string
        $this->assertEquals('Hello world', sprintf('Hello %s', 'world'));
    }
}