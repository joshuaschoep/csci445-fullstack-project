<?php
session_start();

?>

<link rel="stylesheet" href="/header.css" type="text/css">
<header>
    <table>
        <tr>
            <td></td>
            <td><img src="/images/Logo.png" height="64px"></td>
            <td></td>
        </tr>
    </table>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li id="signin"><a href="/login">Sign in</a></li>
            <li id="search">
                <form id="search">
                    <input type="text" placeholder="Search users"><input type="submit" value="Search">
                </form>
            </li>
        </ul>
    </nav>
</header>