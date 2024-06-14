-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 01:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmsonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_group`
--

CREATE TABLE `blog_group` (
  `Blog_id` int(11) NOT NULL,
  `Blog_Name` varchar(30) NOT NULL,
  `Post_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_group`
--

INSERT INTO `blog_group` (`Blog_id`, `Blog_Name`, `Post_Number`) VALUES
(1, 'Programming Language', 15),
(2, 'Project', 7),
(4, 'Art', 43),
(5, 'New & Announcement', 12);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `blog_postid` int(11) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `blog_postid`, `cat_title`) VALUES
(1, 2, 'Android Project'),
(2, 2, 'Javascript Project'),
(3, 2, 'C# Project'),
(4, 2, 'Information Security Project'),
(5, 2, 'Datamining Project'),
(6, 2, 'Python Project'),
(7, 4, 'Digital Drawing'),
(9, 1, 'Javascript'),
(10, 1, 'Python'),
(11, 1, 'HTML'),
(12, 1, 'CSS'),
(13, 1, 'Java'),
(15, 1, 'SQL'),
(16, 1, 'NoSQL'),
(17, 1, 'C#'),
(18, 1, 'Rust'),
(19, 1, 'Perl'),
(20, 1, 'Go'),
(22, 1, 'Other Languages'),
(23, 2, 'Other Projects'),
(24, 5, 'Job Hiring'),
(25, 5, 'Internship Program'),
(26, 5, 'Schorlarship'),
(27, 5, 'Event & Activity'),
(28, 5, 'Calling Tender'),
(30, 4, 'Craft'),
(31, 4, 'Painting'),
(32, 4, 'Literature '),
(33, 5, 'Competitions');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(13, 680001175, 706192101, 'hi'),
(14, 680001175, 795462226, 'hi'),
(15, 1011255920, 336117692, 'hi'),
(16, 1117633960, 1011255920, 'hi'),
(17, 1011255920, 620838129, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(100) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_image` varchar(200) NOT NULL,
  `video_url` text NOT NULL,
  `file_name` varchar(300) NOT NULL,
  `PDFname` varchar(300) NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_status` varchar(30) NOT NULL DEFAULT 'subscriber',
  `like_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_category_id`, `user_id`, `post_title`, `post_author`, `post_date`, `post_image`, `video_url`, `file_name`, `PDFname`, `post_tag`, `post_content`, `post_status`, `like_number`) VALUES
(9, 9, 1, 'Javascript နှင့်ပတ်သတ်ပြီးသိထားသင့်သည့် YouTube and Book များ', 'Hnin Thidar Oo', '2022-12-27 16:08:28', '', '', '', '', 'Javascript နှင့်ပတ်သတ်ပြီးသိထားသင့်သည့် YouTube and Book များ,Hnin Thidar Oo,2022/12/27', '<p><a href=\"https://www.youtube.com/watch?v=setyl9MuPhw\">https://www.youtube.com/watch?v=setyl9MuPhw</a></p><p><a href=\"https://eimaung.com/jsbook/JavaScript-Book-by-Ei-Maung.pdf\">https://eimaung.com/jsbook/JavaScript-Book-by-Ei-Maung.pdf</a></p>', 'draft', 0),
(10, 10, 1, 'Python', 'Hnin Thidar Oo', '2022-12-27 16:13:06', 'python.jpg', '', '', '', 'Python,Hnin Thidar Oo,2022/12/27', '<p>What this language is used for:</p><p>Back-end development&nbsp;</p><p>Data science&nbsp;</p><p>App development</p><p><a target=\"_blank\" href=\"https://www.techopedia.com/definition/3533/python\">Python</a>&nbsp;is a general-purpose programming language that empowers developers to use several different programming styles (i.e., functional, object-oriented, reflective, etc.) when creating programs. Several popular digital tools and platforms were developed with Python, including YouTube, Google Search and iRobot machines. It is also, according to HackerRank, the&nbsp;<a target=\"_blank\" href=\"https://info.hackerrank.com/rs/487-WAY-049/images/HackerRank-2020-Developer-Skills-Report.pdf\">second-most in-demand programming language for hiring managers in the Americas after Python (PDF, 2.4 MB)</a>.</p><p>As one of the more easy-to-learn and -use languages, Python is ideal for beginners and experienced coders alike. The language&nbsp;<a target=\"_blank\" href=\"https://www.infoworld.com/article/3204016/what-is-python-powerful-intuitive-programming.html\">comes with an extensive library</a>&nbsp;that supports common commands and tasks. Its interactive qualities allow programmers to test code as they go, reducing the amount of time wasted on creating and testing long sections of code.&nbsp;&nbsp;</p><p>Additional Resources:</p><p><a href=\"https://bootcamp.berkeley.edu/resources/coding/learn-python/\">Coding Resources: Learn Python</a>&nbsp;&mdash;&nbsp;Berkeley Boot Camps</p><p><a target=\"_blank\" href=\"https://www.edx.org/learn/python\">Learn Python</a>&nbsp;&mdash;&nbsp;edX</p><p><a target=\"_blank\" href=\"https://www.manning.com/books/the-quick-python-book-third-edition\">The Quick Python Book</a>&nbsp;&mdash;&nbsp;Naomi Ceder</p><p><a target=\"_blank\" href=\"https://realpython.com/podcasts/rpp/\">The Real Python Podcast</a>&nbsp;&mdash;&nbsp;Real Python&nbsp;</p>', 'publish', 0),
(11, 10, 1, 'Python နှင့်ပတ်သတ်ပြီးသိထားသင့်သည့် YouTube and Book များ', 'Hnin Thidar Oo', '2022-12-27 16:07:43', '', '', '', '', 'Python နှင့်ပတ်သတ်ပြီးသိထားသင့်သည့် YouTube and Book များ,Hnin Thidar Oo,2022/12/27', '<p><a href=\"https://kiiky.com/my/best-online-python-courses/\">https://kiiky.com/my/best-online-python-courses/</a></p><p><a href=\"https://www.youtube.com/watch?v=q8GdtmrELvQ&amp;list=PL-ew_2kpx4xanABoHpggANt2mYoIakh2m\">https://www.youtube.com/watch?v=q8GdtmrELvQ&amp;list=PL-ew_2kpx4xanABoHpggANt2mYoIakh2m</a></p><p><a href=\"https://www.scribd.com/document/461444762/Python-Basic-Version-1-Myanmar-pdf\">https://www.scribd.com/document/461444762/Python-Basic-Version-1-Myanmar-pdf</a></p>', 'draft', 0),
(12, 11, 1, 'HTML', 'Hnin Thidar Oo', '2022-12-27 16:12:43', 'html.png', '', '', '', 'HTML,Hnin Thidar Oo,2022/12/27', '<p>What this language is used for:&nbsp;</p><p>Web documents&nbsp;</p><p>Website development&nbsp;</p><p>Website maintenance</p><p><a target=\"_blank\" href=\"http://www.simplehtmlguide.com/whatishtml.php\">HTML</a>&nbsp;stands for&nbsp;HyperText Markup Language. Don&rsquo;t let the complicated-sounding name fool you, though; HTML is one of the most accessible stepping stones into the world of programming.&nbsp;</p><p>Technically, HTML is a markup language, which means that it is responsible for formatting the appearance of information on a website. Essentially, HTML is used to describe web pages with ordinary text. It doesn&rsquo;t have the same functionality as other programming languages in this list and is limited to creating and structuring text on a site. Sections, headings, links and paragraphs are all part of the HTML domain.&nbsp;</p><p>As of 2020, HTML shares its #2 spot on Stack Overflow&rsquo;s list of the most commonly used languages in the world with CSS.&nbsp;</p><p>Additional Resources:</p><p>&nbsp;</p><p><a href=\"https://bootcamp.berkeley.edu/resources/coding/learn-html/\">Coding Resources: Learn HTML</a>&nbsp;&mdash;&nbsp;Berkeley Boot Camps&nbsp;</p><p><a target=\"_blank\" href=\"https://www.edx.org/learn/html\">Learn HTML</a>&nbsp;&mdash;&nbsp;edX</p><p><a target=\"_blank\" href=\"https://www.amazon.com/HTML-CSS-Design-Build-Websites/dp/1118008189\">HTML and CSS: Design and Build</a><a target=\"_blank\" href=\"https://www.amazon.com/HTML-CSS-Design-Build-Websites/dp/1118008189\">&nbsp;</a><a target=\"_blank\" href=\"https://www.amazon.com/HTML-CSS-Design-Build-Websites/dp/1118008189\">Websites</a>&nbsp;&mdash;&nbsp;Jon Duckett</p><p><a target=\"_blank\" href=\"https://www.khanacademy.org/computing/computer-programming/html-css\">Intro&nbsp;to&nbsp;HTML/CSS: Making Webpages</a>&nbsp;&mdash;&nbsp;Khan&nbsp;Academy</p><p>&nbsp;</p>', 'publish', 0),
(13, 12, 1, 'CSS', 'Hnin Thidar Oo', '2022-12-27 16:12:25', 'css.jpg', '', '', '', 'CSS,Hnin Thidar Oo,2022/12/27', '<p>What this language is used for:&nbsp;</p><p>&nbsp;Web documents&nbsp;</p><p>&nbsp;Website development&nbsp;</p><p>&nbsp;Website design</p><p><a target=\"_blank\" href=\"http://www.simplehtmlguide.com/whatiscss.php\">CSS</a>, or&nbsp;cascading style sheets, is usually applied in conjunction with HTML and governs the site&rsquo;s appearance. While HTML organizes site text into chunks, CSS is responsible for determining the size, color and position of all page elements.&nbsp;&nbsp;</p><p>CSS is convenient, too; the&nbsp;cascading&nbsp;part of the name means that an applied style will cascade down from parent elements to all children elements across the site. This feature means that once users determine aesthetics for the main&nbsp;parent, they won&rsquo;t have to manually repeat their code across a website. Moreover, the delegation of site organization to HTML and aesthetics to CSS means that users don&rsquo;t have to completely rewrite a web page just to change a color.&nbsp;</p><p>CSS is an approachable language that allows beginning programmers to dip their toes in the metaphorical coding pool. If you&rsquo;re new to&nbsp;<a href=\"https://bootcamp.berkeley.edu/blog/what-is-coding-key-advantages/\">coding</a>, there&rsquo;s no reason not to learn CSS before tackling more complex languages!</p><p>Additional Resources:</p><p><a href=\"https://bootcamp.berkeley.edu/resources/coding/learn-css/\">Coding Resources: Learn CSS&nbsp;</a>&nbsp;&mdash;&nbsp;Berkeley Boot Camps&nbsp;</p><p><a target=\"_blank\" href=\"https://www.edx.org/learn/css\">Learn CSS</a>&nbsp;&mdash;&nbsp;edX</p><p><a target=\"_blank\" href=\"https://www.amazon.com/HTML-CSS-Design-Build-Websites/dp/1118008189\">HTML and CSS: Design and Build Websites</a>&nbsp;&mdash;&nbsp;Jon Duckett&nbsp;</p><p><a target=\"_blank\" href=\"https://www.khanacademy.org/computing/computer-programming/html-css\">Intro to HTML/CSS: Making Webpages</a>&nbsp;&mdash;&nbsp;Khan Academy</p><p><a target=\"_blank\" href=\"https://www.khanacademy.org/computing/hour-of-code/hour-of-code-lessons/hour-of-html/pt/css-basics\">CSS Basics</a>&nbsp;&mdash;&nbsp;Khan Academy</p>', 'publish', 0),
(14, 13, 1, 'JAVA', 'Hnin Thidar Oo', '2022-12-27 16:09:17', 'java.jpg', '', '', '', 'JAVA,Hnin Thidar Oo,2022/12/27', '<p>What this language is used for:&nbsp;</p><p>1.E-commerce&nbsp;</p><p>2.Finance</p><p>3.App development</p><p><a target=\"_blank\" href=\"https://codeinstitute.net/blog/what-is-java/\">Java</a>&nbsp;is a&nbsp;general use&nbsp;and&nbsp;object-oriented&nbsp;programming language. In object-oriented programming, developers create objects that encompass functions and data, which can then be used to provide structure for programs and applications.&nbsp;</p><p>Java currently ranks as the&nbsp;<a target=\"_blank\" href=\"https://info.hackerrank.com/rs/487-WAY-049/images/HackerRank-2020-Developer-Skills-Report.pdf\">third-most sought-after programming language for hiring managers globally (PDF, 2.4 MB)</a>&nbsp;and has held the #5 spot on Stack Overflow&rsquo;s&nbsp;<a target=\"_blank\" href=\"https://insights.stackoverflow.com/survey/2020#most-popular-technologies\">list of the most commonly used languages</a>&nbsp;<a target=\"_blank\" href=\"https://insights.stackoverflow.com/survey/2019#most-popular-technologies\">for two years</a>.&nbsp;</p><p>Java&rsquo;s popularity is for good reason; this language is relatively&nbsp;<a href=\"https://bootcamp.berkeley.edu/blog/best-way-to-learn-java/\">easy to learn and use</a>, boasts incredible security and can handle massive amounts of data. These features make Java an ideal language for the online finance sector, and it is often applied in industries such as banking, billing and the stock market.&nbsp;</p><p>The versatility of the language, however, is what learners find really appealing. Touted as a &ldquo;write-once, run-anywhere&rdquo; language, Java can effectively run on&nbsp;any&nbsp;operating system, regardless of which OS was used to write the original code. It is thus ideal for writing apps not only for mobile phones and computers, but also remote processors, sensors and a variety of other consumer products.&nbsp;</p><p>Additional Resources:</p><p><a target=\"_blank\" href=\"https://www.edx.org/learn/java\">Learn Java</a>&nbsp;&mdash;&nbsp;edX</p><p><a target=\"_blank\" href=\"https://www.codecademy.com/learn/learn-java\">Learn Java</a>&nbsp;&mdash;&nbsp;Codecademy&nbsp;</p><p><a target=\"_blank\" href=\"https://codegym.cc/\">Real-World Java Exercises</a>&nbsp;&mdash;&nbsp;CodeGym&nbsp;</p><p><a target=\"_blank\" href=\"https://www.amazon.com/Java-Beginners-Eighth-Herbert-Schildt/dp/1260440214\">Java: A Beginner&rsquo;s Guide</a>&nbsp;&mdash;&nbsp;Herbert Schildt</p>', 'draft', 0),
(15, 13, 1, 'JAVA နှင့်ပတ်သတ်ပြီးသိထားသင့်သည့် YouTube and Book များ', 'Hnin Thidar Oo', '2022-12-27 16:06:46', '', '', '', '', 'JAVA နှင့်ပတ်သတ်ပြီးသိထားသင့်သည့် YouTube and Book များ,Hnin Thidar Oo,2022/12/27', '<p><a href=\"https://www.todoandroid.es/my/kotlin-vs-java-2-lenguajes-para-programar-desde-android-y-crear-apps/\">https://www.todoandroid.es/my/kotlin-vs-java-2-lenguajes-para-programar-desde-android-y-crear-apps/</a></p><p><a href=\"https://www.youtube.com/watch?v=YOEd5hldfS8&amp;list=PLwVlbpMw9hDn0HGU702xymT3wY-Rl8XDW\">https://www.youtube.com/watch?v=YOEd5hldfS8&amp;list=PLwVlbpMw9hDn0HGU702xymT3wY-Rl8XDW</a></p><p><a href=\"http://htarwaietharnew.blogspot.com/2013/02/java-programming.html\">http://htarwaietharnew.blogspot.com/2013/02/java-programming.html</a></p><p>&nbsp;</p>', 'draft', 0),
(16, 15, 1, 'SQL', 'Hnin Thidar Oo', '2022-12-27 16:11:53', 'sql.jpeg', '', '', '', 'SQL,Hnin Thidar Oo,2022/12/27', '<p>What this language is used for:&nbsp;</p><p>1.Database management&nbsp;</p><p>2.Sales reports&nbsp;</p><p>3.Business management</p><p><a target=\"_blank\" href=\"https://www.techopedia.com/definition/1245/structured-query-language-sql#:~:text=Definition%2520%252D%2520What%2520does%2520Structured%2520Query,or%2520data%2520stream%2520management%2520systems.\">SQL</a>, or&nbsp;Structured Query Language, is a language that allows programmers to query and manipulate databases. As a domain-specific language, it is designed mainly for managing data within an RDBMS (relational database management system). Put simply, SQL can locate and retrieve data from a database, as well as update, add or remove records.&nbsp;</p><p>While SQL is highly functional, it tends to work better with small databases and doesn&rsquo;t always lend itself to managing expansive ones.&nbsp;</p><p>That said, SQL still ranks as&nbsp;<a target=\"_blank\" href=\"https://insights.stackoverflow.com/survey/2020#most-popular-technologies\">the third-most-used language in the programming industry</a>, with over half (54.7%) of surveyed developers reporting that they use it.&nbsp;</p><p>Additional Resources:</p><p><a href=\"https://bootcamp.berkeley.edu/resources/coding/learn-sql/\">Coding Resources: Learn SQL</a>&nbsp;&mdash;&nbsp;Berkeley Boot Camps&nbsp;</p><p><a target=\"_blank\" href=\"https://www.edx.org/learn/sql\">Learn SQL</a>&nbsp;&mdash;&nbsp;edX</p><p><a target=\"_blank\" href=\"https://www.ibm.com/cloud/learn/nosql-databases\">NoSQL Databases Explained</a>&nbsp;&mdash;&nbsp;IBM Cloud</p><p><a target=\"_blank\" href=\"https://www.amazon.com/SQL-NoSQL-Databases-Consistency-Architectures/dp/3658245484\">SQL &amp; NoSQL Databases: Models, Languages, Consistency Options and Architectures for Big Data Management</a>&nbsp;&mdash;&nbsp;Andreas Meier and Michael Kaufmann&nbsp;</p>', 'publish', 0),
(17, 16, 1, 'NoSQL', 'Hnin Thidar Oo', '2022-12-27 16:11:26', 'NoSQL.jpg', '', '', '', 'NoSQL,Hnin Thidar Oo,2022/12/27', '<p>What this language is used for:&nbsp;</p><p>1.Database management&nbsp;</p><p>2.Sales reports&nbsp;</p><p>3.Business management</p><p><a target=\"_blank\" href=\"https://www.techopedia.com/2/28823/enterprise/databases/nosql-101\">NoSQL</a>, or&nbsp;Non-relational SQL, was created to improve SQL&rsquo;s scalability while retaining the other language&rsquo;s ease of use.&nbsp;</p><p>Remember, SQL utilizes&nbsp;relational&nbsp;database/stream management systems that keep data in tables and allows users to manipulate and extract data. NoSQL databases, on the other hand, don&rsquo;t use tables and can be more useful than their predecessors for specific applications, such as storing data in a hierarchical network or supporting large-scale, cloud-based applications.&nbsp;</p><p>Because these languages are both so versatile, they rank high on our list of the most in-demand coding languages.&nbsp;</p><p>Additional Resources:</p><p><a target=\"_blank\" href=\"https://www.edx.org/learn/nosql\">Learn NoSQL</a>&nbsp;&mdash;&nbsp;edX</p><p><a target=\"_blank\" href=\"https://www.amazon.com/Hands-NoSQL-Practical-Implementation-Technical/dp/1119657393\">Hands-On NoSQL: A Practical Guide to Design and Implementation with Technical Case Studies</a>&nbsp;&mdash;&nbsp;Arsames Qajar and Dan Sullivan</p><p><a target=\"_blank\" href=\"https://www.ibm.com/cloud/learn/nosql-databases\">NoSQL Databases Explained</a>&nbsp;&mdash;&nbsp;IBM Cloud</p><p><a target=\"_blank\" href=\"https://www.amazon.com/SQL-NoSQL-Databases-Consistency-Architectures/dp/3658245484\">SQL &amp; NoSQL Databases: Models, Languages, Consistency Options and Architectures for Big Data Management</a>&nbsp;&mdash;&nbsp;Andreas Meier and Michael Kaufmann</p>', 'publish', 0),
(18, 17, 1, 'C#', 'Hnin Thidar Oo', '2022-12-27 16:11:09', 'C#.jpg', '', '', '', 'C#,Hnin Thidar Oo,2022/12/27', '<p>What this language is used for:&nbsp;</p><p>1.Game development</p><p>2.Desktop/web/mobile apps&nbsp;</p><p>3.VR</p><p>Also stylized as&nbsp;C Sharp,&nbsp;this language belongs to the object-oriented family of programming languages.&nbsp;<a target=\"_blank\" href=\"https://www.techopedia.com/definition/26272/c-sharp\">C#</a>&nbsp;was released in 2002 by Microsoft and stands today as a much-loved improvement on the C++ coding language.&nbsp;</p><p>As a general-purpose language, C# is growing in popularity for developing web and desktop applications; according to HackerRank, roughly&nbsp;<a target=\"_blank\" href=\"https://info.hackerrank.com/rs/487-WAY-049/images/HackerRank-2020-Developer-Skills-Report.pdf\">one of every five hiring managers (PDF, 2.4 MB)</a>&nbsp;is looking for a developer that can code with C#. There&rsquo;s no denying that it is one of the most in-demand coding languages for the upcoming year; however, there are other reasons to have this skill on your radar.</p><p>As with other popular languages, an enormous community works with C# and offers support to new learners. Because of this, learning C# may be easier than attempting to learn some of the newer and less-documented languages. Plus, C# is ideal for building ever-more-popular mobile apps and games. There&rsquo;s little doubt that this language will continue to be useful in the coming years.&nbsp;</p><p>Additional Resources:</p><p><a target=\"_blank\" href=\"https://www.edx.org/learn/c-sharp\">Learn C#</a>&nbsp;&mdash;&nbsp;edX</p><p><a target=\"_blank\" href=\"https://dotnet.microsoft.com/learn/csharp\">Learn C#&nbsp;</a>&mdash;&nbsp;Microsoft</p><p><a target=\"_blank\" href=\"https://www.youtube.com/watch?v=GhQdlIFylQ8\">C# Tutorial</a>&nbsp;&mdash;&nbsp;freecodecamp</p><p><a target=\"_blank\" href=\"https://www.amazon.com/8-0-NET-Core-3-0-Cross-Platform-ebook/dp/B07YLXFGBS/?tag=guru990f-20\">Modern Cross-Platform Development: Build Applications With C#</a>&nbsp;&mdash;&nbsp;Mark J. Price</p>', 'publish', 0),
(19, 18, 1, 'Rust', 'Hnin Thidar Oo', '2022-12-27 16:10:50', 'rust.png', '', '', '', 'Rust,Hnin Thidar Oo,2022/12/27', '<p>What this language is used for:&nbsp;</p><p>1.Game development</p><p>2.Desktop/web/mobile apps&nbsp;</p><p>3.VR</p><p>Also stylized as&nbsp;C Sharp,&nbsp;this language belongs to the object-oriented family of programming languages.&nbsp;<a target=\"_blank\" href=\"https://www.techopedia.com/definition/26272/c-sharp\">C#</a>&nbsp;was released in 2002 by Microsoft and stands today as a much-loved improvement on the C++ coding language.&nbsp;</p><p>As a general-purpose language, C# is growing in popularity for developing web and desktop applications; according to HackerRank, roughly&nbsp;<a target=\"_blank\" href=\"https://info.hackerrank.com/rs/487-WAY-049/images/HackerRank-2020-Developer-Skills-Report.pdf\">one of every five hiring managers (PDF, 2.4 MB)</a>&nbsp;is looking for a developer that can code with C#. There&rsquo;s no denying that it is one of the most in-demand coding languages for the upcoming year; however, there are other reasons to have this skill on your radar.</p><p>As with other popular languages, an enormous community works with C# and offers support to new learners. Because of this, learning C# may be easier than attempting to learn some of the newer and less-documented languages. Plus, C# is ideal for building ever-more-popular mobile apps and games. There&rsquo;s little doubt that this language will continue to be useful in the coming years.&nbsp;</p><p>Additional Resources:</p><p><a target=\"_blank\" href=\"https://www.edx.org/learn/c-sharp\">Learn C#</a>&nbsp;&mdash;&nbsp;edX</p><p><a target=\"_blank\" href=\"https://dotnet.microsoft.com/learn/csharp\">Learn C#&nbsp;</a>&mdash;&nbsp;Microsoft</p><p><a target=\"_blank\" href=\"https://www.youtube.com/watch?v=GhQdlIFylQ8\">C# Tutorial</a>&nbsp;&mdash;&nbsp;freecodecamp</p><p><a target=\"_blank\" href=\"https://www.amazon.com/8-0-NET-Core-3-0-Cross-Platform-ebook/dp/B07YLXFGBS/?tag=guru990f-20\">Modern Cross-Platform Development: Build Applications With C#</a>&nbsp;&mdash;&nbsp;Mark J. Price</p>', 'publish', 0),
(20, 19, 1, 'Perl', 'Hnin Thidar Oo', '2022-12-27 16:10:18', 'perl.jpg', '', '', '', 'Perl,Hnin Thidar Oo,2022/12/27', '<p>What this language is used for:</p><p>1.System administration&nbsp;</p><p>2.GUI development&nbsp;</p><p>3.Network programming</p><p>Perl isn&rsquo;t the most commonly used language on the market. In fact, just&nbsp;<a target=\"_blank\" href=\"https://insights.stackoverflow.com/survey/2020#top-paying-technologies\">3.1 percent of developers used it in 2020</a>, and it didn&rsquo;t even&nbsp;<a target=\"_blank\" href=\"https://insights.stackoverflow.com/survey/2019\">make&nbsp;Stack Overflow&rsquo;s commonly used languages list for 2019</a>. However, we are recommending it for a reason. If you&rsquo;re already well into your career, learning Perl could significantly boost your earnings potential.&nbsp;</p><p>While many programming languages are compiled languages &mdash; wherein a target machine translates the program &mdash; Perl is an&nbsp;interpreted&nbsp;language, wherein a third &ldquo;interpreting&rdquo; machine locates the code and executes a task. Usually, interpreted programs require more CPU, but because Perl is such a concise language, it creates short scripts that can be processed quickly.&nbsp;</p><p>Additional Resources:</p><p><a target=\"_blank\" href=\"https://learn.perl.org/\">Learn Perl&nbsp;</a>&mdash;&nbsp;Perl&nbsp;</p><p><a target=\"_blank\" href=\"https://www.youtube.com/watch?v=WEghIXs8F6c\">Perl Tutorial</a>&nbsp;&mdash;&nbsp;Derek Banas&nbsp;</p><p><a target=\"_blank\" href=\"https://www.thriftbooks.com/w/learning-perl_randal-l-schwartz/283952/item/16799784/?mkwid=%7cdc&amp;pcrid=448964098780&amp;pkw=&amp;pmt=&amp;slid=&amp;plc=&amp;pgrid=105775167313&amp;ptaid=pla-924743127976&amp;gclid=EAIaIQobChMI3I2mqvKs6wIVQe7tCh1QjA_CEAQYASABEgLy_vD_BwE#isbn=1449303587&amp;idiq=16799784\">Learning Perl</a>&nbsp;&mdash;&nbsp;Randal L. Schwartz and Tom Phoenix</p>', 'draft', 0),
(21, 20, 1, 'Go', 'Hnin Thidar Oo', '2022-12-27 16:09:51', 'Go.jpg', '', '', '', 'Go,Hnin Thidar Oo,2022/12/27', '<p>What this language is used for:</p><p>1.System/network programming&nbsp;</p><p>2.Audio/video editing&nbsp;</p><p>3.Big Data</p><p>Developed at Google in 2007,&nbsp;<a target=\"_blank\" href=\"https://www.techopedia.com/definition/32308/go-programming-languages\">Go</a>&nbsp;is a top-tier programming language. What makes Go really shine is its efficiency; it is capable of executing several processes concurrently. And as far as programming languages go, it has an extensive &ldquo;vocabulary,&rdquo; meaning it can display more information than other languages.&nbsp;</p><p>Though it uses a similar syntax to C, Go is a standout language that provides top-notch memory safety and management features. Additionally, the language&rsquo;s structural typing capabilities allow for a great deal of functionality and dynamism. Moreover, Go is not only high up on programmers&rsquo; most-loved and most-wanted lists &mdash; it also correlates to a&nbsp;<a target=\"_blank\" href=\"https://info.hackerrank.com/rs/487-WAY-049/images/HackerRank-2020-Developer-Skills-Report.pdf\">33% salary bump (PDF, 2.4 MB)</a>.</p><p>Additional Resources:</p><p><a target=\"_blank\" href=\"https://www.youtube.com/watch?v=YS4e4q9oBaU\">Learn Go</a>&nbsp;&mdash;&nbsp;freecodecamp</p><p><a target=\"_blank\" href=\"https://gobyexample.com/\">Go Annotated Tutorials</a>&nbsp;&mdash;&nbsp;Go By Example</p><p><a target=\"_blank\" href=\"https://www.amazon.com/Introducing-Go-Reliable-Scalable-Programs/dp/1491941952\">Introducing Go</a>&nbsp;&mdash;&nbsp;Caleb Doxsey&nbsp;</p>', 'draft', 0),
(22, 22, 1, 'What Are the Best Programming Languages to Learn in 2023?', 'Hnin Thidar Oo', '2022-12-27 12:01:39', 'Best-Programming-Languages.png', '', '', '', 'What Are the Best Programming Languages to Learn in 2023?,Hnin Thidar Oo,2022/12/27', '<p>What coding and programming language should I learn? JavaScript and Python, two of the most popular languages in the startup industry, are in high demand. Most startups use Python-based backend frameworks such as Django (Python), Flask (Python), and NodeJS (JavaScript). These languages are also considered to be the best programming languages to learn for beginners.</p><p>Below is a list of the most popular programming languages that will be in demand in 2023.</p><p>1.&nbsp;&nbsp;&nbsp; JavaScript</p><p>2.&nbsp;&nbsp;&nbsp; Python</p><p>3.&nbsp;&nbsp;&nbsp; Go</p><p>4.&nbsp;&nbsp;&nbsp; Java</p><p>5.&nbsp;&nbsp;&nbsp; Kotlin</p><p>6.&nbsp;&nbsp;&nbsp; PHP</p><p>7.&nbsp;&nbsp;&nbsp; C#</p><p>8.&nbsp;&nbsp;&nbsp; Swift</p><p>9.&nbsp;&nbsp;&nbsp; R</p><p>10. Ruby</p><p>11. C and C++</p><p>12. MATLAB</p><p>13. TypeScript</p><p>14. Scala</p><p>15. SQL</p><p>16. HTML</p><p>17. CSS</p><p>18. NoSQL</p><p>19. Rust</p><p>20. Perl</p>', 'publish', 0),
(23, 7, 4, 'Adobe Illustrator for beginners', 'Han Ni Khaing Oo', '2022-12-27 14:50:12', 'downloadAdobe.jpg', '', '', '', 'Adobe Illustrator for beginners,Han Ni Khaing Oo,2022/12/27', '<p>Adobe Illustrator 2017 should be installed.</p><p>Adobe illustrator should be learned by those who want to become a graphic designer and who have a passion for graphics.</p><p>If you are going to study Adobe Illustrator, you should first familiarize yourself with each of its tools.</p><p>The most important tool is the pen tool.</p><p>In adobe illustrator, except photo editing, all other designs can be created.</p>', 'publish', 0),
(24, 7, 4, 'About basic tools in Ai', 'Han Ni Khaing Oo', '2022-12-27 14:54:25', 'basictool1.JPG', '', '', '', 'About basic tools in Ai,Han Ni Khaing Oo,2022/12/27', '<p>You should first study shapes and icons, which are basic tools in Ai.</p>', 'publish', 0),
(26, 24, 1, 'C# Developer positions ခေါ်ယူခြင်း ', 'Hnin Thidar Oo', '2022-12-27 15:29:20', 'jobhiring.jpg', '', '', '', 'C# Developer positions ခေါ်ယူခြင်း ,Hnin Thidar Oo,2022/12/27', '<p>ကွန်ပျူတာတက္ကသိုလ်(မကွေး) တွင် တက်ရောက်ပညာသင်ကြားနေသော နောက်ဆုံးနှစ်ကျောင်းသား/ကျောင်းသူများနှင့် ဘွဲ့ရရှိပြီးသော ကျောင်းသား/ကျောင်းသူဟောင်းများ Galaxie AI Co.Ltd မှ ခေါ်ယူသော C# Developer positions အတွက် စိတ်ပါဝင်စားပါက hr@galaxie.ai သို့ CV ပေးပို့လျှောက်ထားနိုင်ပါသည်။</p>', 'publish', 1),
(27, 25, 1, 'Galaxie AI Company Limited Internship Program ', 'Hnin Thidar Oo', '2022-12-27 15:31:27', 'intenship.jpg', '', '', '', 'Galaxie AI Company Limited Internship Program ,Hnin Thidar Oo,2022/12/27', '<p>Galaxie AI Company Limited တွင် <strong>Internship Program</strong> 2021 ပြုလုပ်လိုသော စတုတ္ထနှစ် ကျောင်းသား၊ကျောင်းသူများ၊ OJT လျှောက်ထားလိုသော ပဥ္စမနှစ် ကျောင်းသား၊ကျောင်းသူများနှင့် ဘွဲ့ရရှိပြီးသူများသည် Galaxie AI Company Limited တွင် လျှောက်ထားလိုပါက မိမိတို့၏ CV Form အား email address hr@galaxie.ai သို့ ပေးပို့လျှောက်ထားနိုင်ပါသည်။</p>', 'publish', 0),
(29, 27, 1, 'World Summit on the Information Society (WSIS) Prize 2021 ပြိုင်ပွဲဝင်များဖိတ်ခေါ်ခြင်း', 'Hnin Thidar Oo', '2022-12-27 15:35:57', 'prizes.jpg', '', '', '', 'World Summit on the Information Society (WSIS) Prize 2021 ပြိုင်ပွဲဝင်များဖိတ်ခေါ်ခြင်း,Hnin Thidar Oo,2022/12/27', '<p>အပြည်ပြည်ဆိုင်ရာ ကြေးနန်းဆက်သွယ်ရေးအဖွဲ့ချုပ် (အိုင်တီယူ) မှကြီးမှုး၍ (၁၀) ကြိမ် မြောက် World Summit on the Information Society (WSIS) Prizes 2021 ပြိုင်ပွဲအား Sustainable Development Goals (SDGs) ရည်မှန်းချက်များ ပြည့်မီစေရေးအတွက် အိုင်စီတီ ကဏ္ဍ အနေဖြင့် နိုင်ငံတကာမှ ဆောင်ရွက်လျက်ရှိသည့် ဆောင်ရွက်ချက်များ၊ အတွေ့အကြုံ များကို မျှဝေဆွေးနွေးကာ ပိုမိုထိရောက်မှုရှိသည့် Mechanism တစ်ရပ် ဖန်တီးဖော်ဆောင်နိုင်စေရန် ရည်ရွယ်ချက်ဖြင့် ကျင်းပ ပြုလုပ်မည်ဖြစ်ပါသည်။</p><p>မြန်မာနိုင်ငံမှ ICT နည်းပညာကို အသုံးပြုလျက်ရှိသည့် စီးပွားရေး လုပ်ငန်းများ၊ ICT အသုံးပြု၍ ဝန်ဆောင်မှုပေးနေသည့် အစိုးရ အဖွဲ့အစည်း များ၊ အသင်းအဖွဲ့များ၊ လူငယ် Social Entrepreneurs များ၊ Start-up များနှင့် အခြားစိတ်ပါဝင်စားသည့် မည်သည့်အဖွဲ့အစည်းမဆို ဝင်ရောက်ယှဉ်ပြိုင် နိုင်ရန် ဖိတ်ခေါ်အပ်ပါသည်။</p><p>ပြိုင်ပွဲဝင်များအနေဖြင့် <a target=\"_blank\" href=\"https://l.facebook.com/l.php?u=http%3A%2F%2Fwww.wsis.org%2Fprizes%3Ffbclid%3DIwAR0_nh1FkvNeAOrsr-ZgRvZ2uD7_zlRF2uxTHUQP1f1_xomML1jV9HhDUk4&amp;h=AT0ZpUdYiqZYJg5yEezAbxZMJHFddL3FMCGRVDuKPuVkj_obsL7CXlLBLBB_jMPZuwZx-rIljMBOx4_KmV4rTX0Ibklqb_dUk_nxGL2dsB048fwL-l9gchiv0Lp9Ae8iOsei2muSxhOyeeW6xk7I&amp;__tn__=-UK-R&amp;c%5b0%5d=AT16UbC585QFl0RgC2O0qpXuu9gh8QU6NM4syQA5ECYboD7qnICs-nHe_WUcM-upUCj00DrDuwEKsK94cQpUDkIl4vYm16PJitXhXflvsgr5u24CpXC2o9ewU3X6XszDn9Cvl2o-Sv-RgHBRXEPLSQqExqn4-rK5TDytm2kGxtBYyQNY8VpYEVE8Chh_6qPv8HEwJgtvikSv8w\">www.wsis.org/prizes</a> သို့ (၂၅-၁-၂၀၂၁) နေ့ရက် နောက်ဆုံးထား၍ တိုက်ရိုက် လျှောက်ထားရမည်ဖြစ်ပြီး အသေးစိတ် အချက်အလက်များ သိရှိလိုပါက မြန်မာနိုင်ငံကွန်ပျူတာအသင်းချုပ်သို့ (၁၅ - ၁ - ၂၀၂၁) နေ့ရက် နောက်ဆုံးထား၍ ဆက်သွယ်မေးမြန်နိုင်ပါသည်။</p>', 'publish', 2),
(30, 27, 1, 'Learning Management System (LMS) ', 'Hnin Thidar Oo', '2022-12-27 15:37:40', 'ucsmgy.jpg', '', '', '', 'Learning Management System (LMS) ,Hnin Thidar Oo,2022/12/27', '<p>ကွန်ပျူတာတက္ကသိုလ်(မကွေး) ကျောင်းသား/ကျောင်းသူများ <strong>Learning Management System (LMS)</strong> မှ သင်ခန်းစာများလေ့လာသင်ယူနိုင်ရေးအတွက် username နှင့် password တို့ကို ကျောင်းသားတစ်ဦး ချင်းစီ ၏ edu mail သို့ ပေးပို့ထားပြီးဖြစ်ပါသည်။ မိမိတို့နှင့်သက်ဆိုင်သည့် အတန်းအလိုက် ဘာသာရပ် များကို <a target=\"_blank\" href=\"http://lms.ucsmgy.edu.mm/?fbclid=IwAR08pqCofmubYx-KgpoCzo4T6LnNGCaSDrVeCGiDIf091FTvF_svv3Z5baU\">http://lms.ucsmgy.edu.mm/</a> တွင်ဝင်ရောက်လေ့လာနိုင်ပါသည်။</p>', 'publish', 0),
(31, 28, 1, '၂၀၂၀-၂၀၂၁ ဘဏ္ဍာရေးနှစ် ရုံးသုံးစက်ကိရိယာ၊ စက်ပစ္စည်းနှင့်ရုံးသုံးပရိဘောဂ တင်ဒါခေါ်ယူခြင်း', 'Hnin Thidar Oo', '2022-12-27 15:39:06', 'tindar.jpg', '', '', '', '၂၀၂၀-၂၀၂၁ ဘဏ္ဍာရေးနှစ် ရုံးသုံးစက်ကိရိယာ၊ စက်ပစ္စည်းနှင့်ရုံးသုံးပရိဘောဂ တင်ဒါခေါ်ယူခြင်း,Hnin Thidar Oo,2022/12/27', '<p>- တင်ဒါခေါ်ယူခြင်းနှင့်ပတ်သက်သော အသေးစိတ်အချက်အလက်နှင့်တင်ဒါလျှောက်လွှာများကို ကွန်ပျူတာတက္ကသိုလ်(မကွေး)၏ အောက်ပါ Link များတွင်ဝင်ရောက်ကြည့်ရူ့၍ download ရယူနိုင်ပါသည်။&nbsp;&nbsp; <strong>December 2, 2020</strong></p><p>Lot-1(Printer, Desktop Computer, Laptop Computer, Document Scanner)</p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/12/Lot-1.pdf?fbclid=IwAR0nOj2L2E5MnyY6EHywJg8kzKENEyWi50QeLfNL1fjHJ_aLGcRCNb7KMFM\">https://www.ucsmgy.edu.mm/wp.../uploads/2020/12/Lot-1.pdf</a></p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/12/Lot-1-20-21OE.xlsx?fbclid=IwAR0_glF-2HF2HdMlf7atILA_hnQoPOzKqToALJcqG9GdJIbyWjckrulTYrM\">https://www.ucsmgy.edu.mm/.../2020/12/Lot-1-20-21OE.xlsx</a></p><p>Lot-2( Copier)</p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/12/Lot-2.pdf?fbclid=IwAR2dOOhxKbAi3IT-WVrrjiNqf9UWlu5EcnIx0jMjNxBroNuBxNRtnn-DFoI\">https://www.ucsmgy.edu.mm/wp.../uploads/2020/12/Lot-2.pdf</a></p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/12/Lot-2-20-21-OE.xlsx?fbclid=IwAR3LeNHaJzlw2ec3E7ai1rmLD32ywEQhqeA7LpmbGXQV_dNp3wYm1M-Qpio\">https://www.ucsmgy.edu.mm/.../2020/12/Lot-2-20-21-OE.xlsx</a></p><p>Lot-3(Air-Con 3 HP Stand type)နှင့်( Air-Con 2 HP Split type)</p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/12/Lot-3.pdf?fbclid=IwAR3957jHdaKiAI8N_kvZlYCn3lc1dnGavUkJ-x8y4gSr80suPQt9kinLGF4\">https://www.ucsmgy.edu.mm/wp.../uploads/2020/12/Lot-3.pdf</a></p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/12/Lot-3-20-21-ME.xlsx?fbclid=IwAR1dNAsVvJrmBfMNzBJLgyoIiryZQHZv01L1Ds6FOR3Ah7qVLAlJEgFbaX4\">https://www.ucsmgy.edu.mm/.../2020/12/Lot-3-20-21-ME.xlsx</a></p><p>Lot-4(Portable Projector, Wall Screen)</p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/12/Lot-4.pdf?fbclid=IwAR121gdpROUCdWciyGsf0V4U5MzwiNDAeZIwAW47SfouUF8_lQC2JH6NwK0\">https://www.ucsmgy.edu.mm/wp.../uploads/2020/12/Lot-4.pdf</a></p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/12/Lot-4-20-21-ME.xlsx?fbclid=IwAR1OIcT3HbW_F2pNUaV4OtfVPsN5qua7DK0hm2KscbKW-NiN6mbzNgQqqrQ\">https://www.ucsmgy.edu.mm/.../2020/12/Lot-4-20-21-ME.xlsx</a></p><p>Lot-5(UPS)</p><p><a target=\"_blank\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.ucsmgy.edu.mm%2Fwp-content%2Fuploads%2F2020%2F12%2FLot-5.pdf%3Ffbclid%3DIwAR0fJoXdLcspmcGIx0LbVwm_7KcbHccSRZXi6LJujKLQ0SDFh1ir8fQ_VgA&amp;h=AT3wIU4S33q4rCcgKLq08NmOV6mtjIFTf3-8RL6lz_avFU7ge6Q831OTeIMs_faSqtYrYzBAJLREDh5fHU9cLF3XkDc4ANAPLp0lpSWgjPt70mMawhuFK-AKo3Y9X3W1cCXkPameSaK0_WVrMLdh&amp;__tn__=-UK-R&amp;c%5b0%5d=AT0soNXG1U9MRlgJ-nkL68650cSLKkzZcbgeNE5vVadPGuYk5NrVTyahiJ9WKJ3ToL0Qhbr9pTwfKHGHz1v8DbKY3QjoWoqnZ-0aOUDRxdp0B7bMMLeJxs_W3WG6U5eQRNcuByGiZwgMinhfomNaFhKC24iLRCWpBgfgyu0ZQCae3iVLvc1oucy5FXcf3Mea-6luusNn2rRwzQ\">https://www.ucsmgy.edu.mm/wp.../uploads/2020/12/Lot-5.pdf</a></p><p><a target=\"_blank\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.ucsmgy.edu.mm%2Fwp-content%2Fuploads%2F2020%2F12%2FLot-520-21-NCI.xlsx%3Ffbclid%3DIwAR2rwbqSCY85NRogKK0bhDuvyU62dNMynWxJjgJl9_Z_b27lLQ61JoXbdvk&amp;h=AT0D9LecR4MVfx9EVj1ZZuvKMpbYQeIuY600Nu3L2-Ha7HE3xSRyUsbGt3WZTcLpns-0Kn2CxsKrK6n3e6KSIbs4oPdZhnaew8gS-0ZOW-RsjJE0VPZZTsfboSdCXbvofsso3u3JB2KCHHdtFWPZ&amp;__tn__=-UK-R&amp;c%5b0%5d=AT0soNXG1U9MRlgJ-nkL68650cSLKkzZcbgeNE5vVadPGuYk5NrVTyahiJ9WKJ3ToL0Qhbr9pTwfKHGHz1v8DbKY3QjoWoqnZ-0aOUDRxdp0B7bMMLeJxs_W3WG6U5eQRNcuByGiZwgMinhfomNaFhKC24iLRCWpBgfgyu0ZQCae3iVLvc1oucy5FXcf3Mea-6luusNn2rRwzQ\">https://www.ucsmgy.edu.mm/.../2020/12/Lot-520-21-NCI.xlsx</a></p><p>Lot-6(Standard Digital signal processing Trainer)</p><p><a target=\"_blank\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.ucsmgy.edu.mm%2Fwp-content%2Fuploads%2F2020%2F12%2FLot-6.pdf%3Ffbclid%3DIwAR3JmypUpdfwPNvvZv1VxHdUs56W18sc6izq_LR4r-fcfIp0okQU_sBLZyc&amp;h=AT1ODWv-wJ8LEBnOpFU0xBVFgVw_kEyj9r3RXQ3GYbfeqEspt68C6GxYm2dVVTOHbhDA8n1leYG1zukR-XGmlW6ec-Tbi_Xi0Y4qWEiIqEfhob1TQs9ZGUdUz-5sBheSkTNwDak1y52jcUVlZKET&amp;__tn__=-UK-R&amp;c%5b0%5d=AT0soNXG1U9MRlgJ-nkL68650cSLKkzZcbgeNE5vVadPGuYk5NrVTyahiJ9WKJ3ToL0Qhbr9pTwfKHGHz1v8DbKY3QjoWoqnZ-0aOUDRxdp0B7bMMLeJxs_W3WG6U5eQRNcuByGiZwgMinhfomNaFhKC24iLRCWpBgfgyu0ZQCae3iVLvc1oucy5FXcf3Mea-6luusNn2rRwzQ\">https://www.ucsmgy.edu.mm/wp.../uploads/2020/12/Lot-6.pdf</a></p><p><a target=\"_blank\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.ucsmgy.edu.mm%2Fwp-content%2Fuploads%2F2020%2F12%2FLot-6-20-21-NCI.xlsx%3Ffbclid%3DIwAR1r5-akCPxs7mp2XYRyLoqpcCDZpmyCb9H5YO3BEzcu72buJzVmFMKlKlA&amp;h=AT0rmUARCoK8LTiH-gZJFoYG2Nz9ttEVQaCCcZmBVI00LiR6VHqBdpwlWrGxi1VYdpJoo6I1DCDDfKRyAYT5lrohiG3Rih4406R5nqWCQzP24Nb0yyXXCzfIGEbV_RV2mGmHYPyoocwyfAAtkfLJ&amp;__tn__=-UK-R&amp;c%5b0%5d=AT0soNXG1U9MRlgJ-nkL68650cSLKkzZcbgeNE5vVadPGuYk5NrVTyahiJ9WKJ3ToL0Qhbr9pTwfKHGHz1v8DbKY3QjoWoqnZ-0aOUDRxdp0B7bMMLeJxs_W3WG6U5eQRNcuByGiZwgMinhfomNaFhKC24iLRCWpBgfgyu0ZQCae3iVLvc1oucy5FXcf3Mea-6luusNn2rRwzQ\">https://www.ucsmgy.edu.mm/.../2020/12/Lot-6-20-21-NCI.xlsx</a></p><p>Lot-7(SAS Controller Card, Cisco Catalyst Switch Layer 3, etc.)</p><p><a target=\"_blank\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.ucsmgy.edu.mm%2Fwp-content%2Fuploads%2F2020%2F12%2FLot-7.pdf%3Ffbclid%3DIwAR2Tp8e3-njELpH6VVkjm5mIprTRbrZ_O3CJJJ8L_KzP9jPHxCkilbVXdbk&amp;h=AT0ItPUUWRwA5AmA99hGjj2ZqCM3I2vtXN8BJ-s2M9EbmuHKGFgtx6esshX0Aj1qMOx3yzvKyaUa-07kxCJrgbm5Da0LOkymkkGlIYZuyywfnkJdY52gOC7NwzO3Exu0yznLGjMdSwZMvl-L8S-b&amp;__tn__=-UK-R&amp;c%5b0%5d=AT0soNXG1U9MRlgJ-nkL68650cSLKkzZcbgeNE5vVadPGuYk5NrVTyahiJ9WKJ3ToL0Qhbr9pTwfKHGHz1v8DbKY3QjoWoqnZ-0aOUDRxdp0B7bMMLeJxs_W3WG6U5eQRNcuByGiZwgMinhfomNaFhKC24iLRCWpBgfgyu0ZQCae3iVLvc1oucy5FXcf3Mea-6luusNn2rRwzQ\">https://www.ucsmgy.edu.mm/wp.../uploads/2020/12/Lot-7.pdf</a></p><p><a target=\"_blank\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.ucsmgy.edu.mm%2Fwp-content%2Fuploads%2F2020%2F12%2FLot-7-20-21-NCI_.xlsx%3Ffbclid%3DIwAR3JmypUpdfwPNvvZv1VxHdUs56W18sc6izq_LR4r-fcfIp0okQU_sBLZyc&amp;h=AT0Cmz7KpfmKg1kBkcQZGFfcDMtLDSchDcfAD1J46aI0Z1ka3519jcJmmCYxP54eoZ5IaBVrWJ7a-qft2H_04OQq4pYoUun1IojGxlEsUubpoZ8g7W8QuaPErPYhA6u64--g52DqKblrMSwRhUlz&amp;__tn__=-UK-R&amp;c%5b0%5d=AT0soNXG1U9MRlgJ-nkL68650cSLKkzZcbgeNE5vVadPGuYk5NrVTyahiJ9WKJ3ToL0Qhbr9pTwfKHGHz1v8DbKY3QjoWoqnZ-0aOUDRxdp0B7bMMLeJxs_W3WG6U5eQRNcuByGiZwgMinhfomNaFhKC24iLRCWpBgfgyu0ZQCae3iVLvc1oucy5FXcf3Mea-6luusNn2rRwzQ\">https://www.ucsmgy.edu.mm/.../2020/12/Lot-7-20-21-NCI_.xlsx</a></p><p>Lot-8(E-Pro Interactive white Board, E-Pro Portable Wireless Rostrum, Microphone and speaker United)</p><p><a target=\"_blank\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.ucsmgy.edu.mm%2Fwp-content%2Fuploads%2F2020%2F12%2FLot-8.pdf%3Ffbclid%3DIwAR2gLo2xW_sy-qGom90XSNbtWQ0niLEpwi2V80DrPzSNXmDLPLZvA8mlVww&amp;h=AT3AXK3tl4fmHHCI2jq-kq2SOGaL6YUT6IEGCN7r3xHCcw9gHxwDzFw_VqoCrwvbCT-Zt9LxSU4oybvHpoNv1IzYM0iz8_2RKBE30YM4PAKcZWryP_VsEhvFebjHWIfNTIJjj_nkzoB5TbMIYjcw&amp;__tn__=-UK-R&amp;c%5b0%5d=AT0soNXG1U9MRlgJ-nkL68650cSLKkzZcbgeNE5vVadPGuYk5NrVTyahiJ9WKJ3ToL0Qhbr9pTwfKHGHz1v8DbKY3QjoWoqnZ-0aOUDRxdp0B7bMMLeJxs_W3WG6U5eQRNcuByGiZwgMinhfomNaFhKC24iLRCWpBgfgyu0ZQCae3iVLvc1oucy5FXcf3Mea-6luusNn2rRwzQ\">https://www.ucsmgy.edu.mm/wp.../uploads/2020/12/Lot-8.pdf</a></p><p><a target=\"_blank\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.ucsmgy.edu.mm%2Fwp-content%2Fuploads%2F2020%2F12%2FLot-8-20-21-NCI.xlsx%3Ffbclid%3DIwAR08pqCofmubYx-KgpoCzo4T6LnNGCaSDrVeCGiDIf091FTvF_svv3Z5baU&amp;h=AT01G11-Lejdc1LA1ltPpgGu5tiRNwQkHsaEFWejmRwAovNIZsyUi-WWRYaZADn3ESuMSaeDDVDTOAzyIZ379ELOU4NAqQhfPId2LxvH40BgSJF4dtk_lYAF2sBVZ7KNg9T8v_3A_QQVA78-X7zX&amp;__tn__=-UK-R&amp;c%5b0%5d=AT0soNXG1U9MRlgJ-nkL68650cSLKkzZcbgeNE5vVadPGuYk5NrVTyahiJ9WKJ3ToL0Qhbr9pTwfKHGHz1v8DbKY3QjoWoqnZ-0aOUDRxdp0B7bMMLeJxs_W3WG6U5eQRNcuByGiZwgMinhfomNaFhKC24iLRCWpBgfgyu0ZQCae3iVLvc1oucy5FXcf3Mea-6luusNn2rRwzQ\">https://www.ucsmgy.edu.mm/.../2020/12/Lot-8-20-21-NCI.xlsx</a></p><p>Lot-9(Al-lo T-Smart-Server-v2.1.1-e)</p><p><a target=\"_blank\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.ucsmgy.edu.mm%2Fwp-content%2Fuploads%2F2020%2F12%2FLot-9.pdf%3Ffbclid%3DIwAR2QXTl77u-SNlfmKrjkeXeDkiDtn1Jj9c7vRr6UxBM-HBXBvAt6LEh4zsE&amp;h=AT06hHdyrU0pro_Xh2wwCC7yi3x-Bs4UK7DsBhdD-WVUWTv7idqNEHfMEWzXGuJKrbs2mS1xvrQS1LDQ77HLbSUFC7FXWsnxOV8JEJufX9ybklGR6Jkz4sTi9snJg8ui0Yvu68suXWZGNt9T_2vj&amp;__tn__=-UK-R&amp;c%5b0%5d=AT0soNXG1U9MRlgJ-nkL68650cSLKkzZcbgeNE5vVadPGuYk5NrVTyahiJ9WKJ3ToL0Qhbr9pTwfKHGHz1v8DbKY3QjoWoqnZ-0aOUDRxdp0B7bMMLeJxs_W3WG6U5eQRNcuByGiZwgMinhfomNaFhKC24iLRCWpBgfgyu0ZQCae3iVLvc1oucy5FXcf3Mea-6luusNn2rRwzQ\">https://www.ucsmgy.edu.mm/wp.../uploads/2020/12/Lot-9.pdf</a></p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/12/Lot-9-20-21-NCI.xlsx?fbclid=IwAR0ycmw7V93_qpEfeHUIdFkouwjWJoayp4vzT1MNXnaEKBncym-RJ3jAIKk\">https://www.ucsmgy.edu.mm/.../2020/12/Lot-9-20-21-NCI.xlsx</a></p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/12/AI-IoT-Smart-SeverDetail-Specifications.pdf?fbclid=IwAR22kMRSZay9bhZF_tX78_Uig-Xm6XEWhrmQ9DCn0ptZxu285IOYbFp7DZg\">https://www.ucsmgy.edu.mm/.../AI-IoT-Smart-SeverDetail...</a></p><p>Lot-10(Furniture)(Plastic ထိုင်ခုံ၊ အရာရှိစားပွဲ၊အလူမီနီယံဗီရို၊ စကားပြောစင်၊ etc.)</p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/12/Lot-10.pdf?fbclid=IwAR3Y-ZW--GfPZWQ76rBQm85DFx5I-rpieaoqWcXNqblurCx6N8C8yIl_TIc\">https://www.ucsmgy.edu.mm/wp.../uploads/2020/12/Lot-10.pdf</a></p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/12/Lot-10-20-21-Furniture.xlsx?fbclid=IwAR0OLmkaF_e9sjaX6QLeKeLbJKc0NBFr-t6iRNv75sZ5pLjHnR1U5snVfh0\">https://www.ucsmgy.edu.mm/.../12/Lot-10-20-21-Furniture.xlsx</a></p>', 'publish', 0),
(32, 28, 1, '၂၀၀၂-၂၀၂၁ ဘဏ္ဍာရေးနှစ်တည်ဆောက်ရေးလုပ်ငန်းများအတွက် အိတ်ဖွင့်တင်ဒါခေါ်ယူခြင်း', 'Hnin Thidar Oo', '2022-12-27 15:41:19', 'tindar2.jpg', '', '', '', '၂၀၀၂-၂၀၂၁ ဘဏ္ဍာရေးနှစ်တည်ဆောက်ရေးလုပ်ငန်းများအတွက် အိတ်ဖွင့်တင်ဒါခေါ်ယူခြင်း,Hnin Thidar Oo,2022/12/27', '<p>Tender စည်းကမ်းသတ်မှတ်ချက်များကို အောက်ပါ Link တွင် ဝင်ရောက်ကြည့်ရူ့နိုင်ပါသည်။</p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/10/Tender-4unit-4storey-and-Stadium.pdf?fbclid=IwAR0_d8mn5J08o7lTAb9A2fZTbp3ff_F047IIL6g5SrwE4O-NwjzGPCaIolk\">https://www.ucsmgy.edu.mm/.../Tender-4unit-4storey-and...</a></p><p>Tender လျှောက်လွှာများကို အောက်ပါ Link တွင် Download ရယူနိုင်ပါသည်။</p><p><a target=\"_blank\" href=\"https://www.ucsmgy.edu.mm/wp-content/uploads/2020/10/Tender-Form.pdf?fbclid=IwAR0mUCrNUfcaFZi1IFIWaZpwXLfiw8RQRbbhq6K6s3WblI_jyINJo--Nsm8\">https://www.ucsmgy.edu.mm/.../upl.../2020/10/Tender-Form.pdf</a></p>', 'publish', 0),
(33, 27, 1, 'Innovative Robot Project Competition ပြိုင်ပွဲ', 'Admin', '2023-01-28 20:25:02', 'competition.jpg', '', '', '', 'Innovative Robot Project Competition ပြိုင်ပွဲ,Admin,2023/01/28', '<p>ပို့ဆောင်ရေးနှင့် ဆက်သွယ်ရေးဝန်ကြီးဌာန၊ Asia Pacific Tele community၊ မြန်မာနိုင်ငံကွန်ပျူတာ အသင်းချုပ်၏ လမ်းညွှန်မှုဖြင့် Asia Pacific Tele Community မှ ပေးအပ်သော အထောက်အပံ့ဖြင့် ကျင်းပမည့် &ldquo;Innovative Robot Project Competition&rdquo; ပြိုင်ပွဲကို ကျောင်းသူကျောင်းသားများ၏ နည်းပညာတီထွင် ဆန်းသစ်မှုများ၊ ကျောင်းတွင်းအဖွဲ့အစည်း Teamwork လုပ်ဆောင်မှုများ၊ ပညာရပ်ဆိုင်ရာ (STEM) သိပ္ပံ နည်းပညာ၊ အင်ဂျင်နီယာနှင့် သင်္ချာဘာသာရပ်များ၊ ဝေဖန်ဆန်းစစ်ခြင်း၊ ပူးပေါင်းဆောင်ရွက် ဖလှယ်မှုများအား ပြိုင်ပွဲမှတဆင့် လက်ဆင့်ကမ်း ပြန့်ပွားနိုင်ရန်အတွက် ၂၀၂၀ ပြည့်နှစ်၊ ဒီဇင်ဘာလ (၅) ရက်၊ စနေနေ့တွင် မြန်မာနိုင်ငံကွန်ပျူတာ ပညာရှင်အသင်းက ကြီးမှူး၍ &quot;Innovative Robot Project Competition&quot; ပြိုင်ပွဲကို ရန်ကုန်မြို့၊ MICT Park ၊ Conference Hall တွင် နံနက် (၉) နာရီမှ ညနေ (၃) နာရီအထိ ကျွမ်းကျင်မှုဧရိယာအလိုက် စည်ကားသိုက်မြိုက်စွာ ကျင်းပသွားမည် ဖြစ်ပါသည်။</p><p>APT Young Professionals and Students Programme 2020 အခမ်းအနားသို့ ကျောင်းသား/ ကျောင်းသူများ၊ သိပ္ပံနှင့်နည်းပညာအသစ်အဆန်းများအား လေ့လာသူများ၊ ICT ဆိုင်ရာသင်တန်းကျောင်းများ၊ ပညာရေးနယ်ပယ်မှ သင်တန်းကျောင်းများနှင့် အစိုးရပညာရေးဆိုင်ရာ ကျောင်းများ၊ တက္ကသိုလ်များ၊ ဌာနဆိုင်ရာများမှ လာရောက် လေ့လာ နိုင်ပါသည်။</p><p>APT Young Professionals and Students Programme 2020 Innovative Robot Project Competition ပြိုင်ပွဲတွင် အမျိုးအစားများ အနေဖြင့် Categories (၂) မျိုး သတ်မှတ်ထားပါသည်။</p><p>Junior Innovative Robot Project Competition</p><p>Senior Innovative Robot Project Competition</p><p>စုံစမ်းရန် &gt;&gt; မြန်မာနိုင်ငံကွန်ပျူတာပညာရှင်အသင်း (MCPA), အဆောင် (၉) မြေညီထပ်၊ MICT Park, လှိုင်တက္ကသိုလ်နယ်မြေ၊ ရန်ကုန်မြို့။ ဖုန်း - ၀၁ ၆၅၂၂၇၆, ၀၉ ၅၀၆၇၁၆၅၊ Email: - office@mcpamyanmar.org</p><p>ပါဝင်ယှဉ်ပြိုင်မည့် ကျောင်းသား/ကျောင်းသူများသည် ပြိုင်ပွဲဝင်ခွင့် လျှောက်လွှာ၊ စည်းကမ်းချက်များကို</p><p>MCPA Website <a target=\"_blank\" href=\"https://l.facebook.com/l.php?u=http%3A%2F%2Fwww.mcpamyanmar.org%2F%3Ffbclid%3DIwAR0FGsCmEIcgG-FzErqg-p_sr6RyFghhvejcR4qEG0s0EXcZZstBsnQrGuA&amp;h=AT25EHSqcix5O62P_93wQjsGwN4ZxHjyVU-Txsukxb2TW1VfD_XvKAMRdJZ7Z9PNvp8HjOM0IpTDZqD217dpSzpF_q63NyPKF_FvbdrccehCiFzYs5m6j5d0jmNmvEz7ZS8-xJ6giLt3nvxqSG9S&amp;__tn__=-UK-R&amp;c%5b0%5d=AT2hvNG0WRwlUaQk0hxmdvZK3aCkQyeoHHjjBpJUjpmEaYBpb0D2h90RZIaOpUMAWqeQHCDT-aLHAZFAb3SYxjGZS6ZO_OAIS43HrJXcSskU6JEyIs8tB7PfPKGfPxxo7IjXOJjN601yEIE--Hnwll0_6FqAsymkwEzEcsLOty8Rfm_IHruT7Nzfu0E6MNLtNuMglWxY7jW77w\">www.mcpamyanmar.org</a> နှင့်</p><p>APT facebook Page <a href=\"https://www.facebook.com/APT-Young-Professional-2020-109913724169134?__cft__%5b0%5d=AZVYzdHOQzg4kKqffZeUhRsxLBYWY9DoRpCLSgXCNzRd-wK5SEcI8b-Ln7-Y_WA1Vhi7ywTHVa51Inf9_j0xdApqezp_Cd0OIqfY9Vsiwze41t3yW2dCy545s4spgdyNbOumpmFAoPCxWMG1Is-Bw0gmwukT0foSXXBHHetvndeXYpXbuPASA8NOhf4gst5F-Mk&amp;__tn__=-UK-R\"><strong>https://www.facebook.com/APT-Young-Professional-2020...</strong></a> တွင်</p><p>Download ရယူပြီး လျှောက်ထားနိုင်ပါသည်။ ပြိုင်ပွဲဝင်လျှောက်လွှာများကို ၂၀၂၀ ပြည့်နှစ်၊ အောက်တိုဘာလ (၈) ရက် ကြာသပတေးနေ့ ညနေ (၄:၀၀) နာရီ နောက်ဆုံးထားပြီး မြန်မာနိုင်ငံကွန်ပျူတာပညာရှင်အသင်း ရုံးခန်း အဆောင် (၉)၊ မြေညီထပ်၊ MICT Park သို့ လူကိုယ်တိုင် ဖြစ်စေ၊ မေးလိပ်စာ - office@mcpamyanmar.org, aptyoungprofessional12@gmail.com တို့သို့ ပေးပို့နိုင်ပါသည်။</p>', 'publish', 0),
(35, 7, 4, 'shape', 'Han Ni Khaing Oo', '2022-12-27 06:38:53', 'shape.jpg', '', '', '', 'shape,Han Ni Khaing Oo,2022/12/27', '<p>These are pictures drawn with the shape tools.</p>', 'publish', 0),
(36, 7, 4, 'pen tool', 'Han Ni Khaing Oo', '2022-12-27 06:39:58', 'pentool.png', '', '', '', 'pen tool,Han Ni Khaing Oo,2022/12/27', '<p>You can create many desired designs with the pen tool.</p>', 'publish', 0),
(37, 7, 4, 'pen tool illustration', 'Han Ni Khaing Oo', '2022-12-27 06:41:00', 'ss1.JPG', '', '', '', 'pen tool illustration,Han Ni Khaing Oo,2022/12/27', '<p>I practiced flat illustration using pen tools.</p>', 'publish', 0),
(38, 7, 4, 'How to export', 'Han Ni Khaing Oo', '2022-12-27 06:42:29', 'ss5.JPG', '', '', '', 'How to export,Han Ni Khaing Oo,2022/12/27', '<p>If you want to export the picture you have already drawn.</p>', 'publish', 0),
(39, 7, 4, 'vector illustration', 'Han Ni Khaing Oo', '2022-12-27 06:43:26', 'fruit2.jpg', '', '', '', 'vector illustration,Han Ni Khaing Oo,2022/12/27', '<p>Vector illustration</p>', 'publish', 0),
(40, 7, 4, 'social media design', 'Han Ni Khaing Oo', '2022-12-27 06:44:20', 'ss.JPG', '', '', '', 'social media design,Han Ni Khaing Oo,2022/12/27', '<p>We can create many social media designs and brochure designs with Ai.</p>', 'publish', 0),
(41, 7, 4, 'horizontal banner design', 'Han Ni Khaing Oo', '2022-12-27 06:48:59', 'FOODPOSTCARD2.jpg', '', '', '', 'horizontal banner design,Han Ni Khaing Oo,2022/12/27', '<p>Horizontal banner design</p>', 'publish', 0),
(42, 7, 4, 'flyer design', 'Han Ni Khaing Oo', '2022-12-27 06:52:21', 'flyerdesign.jpg', '', '', '', 'flyer design,Han Ni Khaing Oo,2022/12/27', '<p>Flyer design</p>', 'publish', 0),
(43, 7, 4, 'ticket design', 'Han Ni Khaing Oo', '2022-12-27 06:53:11', 'ticket.jpg', '', '', '', 'ticket design,Han Ni Khaing Oo,2022/12/27', '<p>ticket design</p>', 'publish', 0),
(45, 7, 4, 'typography', 'Han Ni Khaing Oo', '2022-12-27 06:55:31', 'ss3.JPG', '', '', '', 'typography,Han Ni Khaing Oo,2022/12/27', '<p>Typography</p>', 'publish', 0),
(46, 7, 4, 'perspective tool', 'Han Ni Khaing Oo', '2022-12-27 06:56:33', 'ss4.JPG', '', '', '', 'perspective tool,Han Ni Khaing Oo,2022/12/27', '<p>Perspective tool</p>', 'publish', 0),
(51, 7, 4, 'mesh tool', 'Han Ni Khaing Oo', '2022-12-29 21:47:42', 'ss2.JPG', '', '', '', 'mesh tool,Han Ni Khaing Oo,2022/12/27', '<p>You can draw small 3D shapes with the mesh tool.</p>(#CrdHan Ni Khaing Oo)(#CrdHan Ni Khaing Oo)', 'publish', 0),
(57, 9, 1, 'JavaScript', 'Hnin Thidar Oo', '2023-01-06 01:51:17', 'js.jpg', '', '', '', 'JavaScript,Nandar Lin,2022/12/27', '<p>What this language is used for:&nbsp;</p><ol><li>Web development</li><li>Game development</li><li>&nbsp;Mobile apps&nbsp;</li><li>&nbsp;Building web servers</li></ol><p>According to&nbsp;<a target=\"_blank\" href=\"https://insights.stackoverflow.com/survey/2020#technology-programming-scripting-and-markup-languages-professional-developers\">Stack Overflow&rsquo;s 2020 Developer Survey</a>, JavaScript currently stands as the most commonly-used language in the world (69.7%), followed by HTML/CSS (62.4%), SQL (56.9%), Python (41.6%) and Java (38.4%). It is also the&nbsp;<a target=\"_blank\" href=\"https://info.hackerrank.com/rs/487-WAY-049/images/HackerRank-2020-Developer-Skills-Report.pdf\">most sought-out programming language by hiring managers in the Americas (PDF, 2.4 MB)</a>.&nbsp;</p><p><a target=\"_blank\" href=\"https://developer.mozilla.org/en-US/docs/Learn/JavaScript/First_steps/What_is_JavaScript\">JavaScript</a>&nbsp;is used to manage the&nbsp;behavior&nbsp;of web pages. With it, coders can create dynamic web elements such as animated graphics, interactive maps, clickable buttons and more. Programmers who use HTML, CSS and JavaScript in tandem obtain a higher level of website control and can provide a better user experience in terms of navigation and readability.&nbsp;</p><p>JavaScript is the most common coding language in use today around the world. This is for a good reason: most web browsers utilize it and it&rsquo;s one of the easiest languages to learn.</p><p>Additional Resources:</p><p><a href=\"https://bootcamp.berkeley.edu/resources/coding/learn-javascript/\">Coding Resources: Learn JavaScript</a>&nbsp;&mdash;&nbsp;Berkeley Boot Camps</p><p><a target=\"_blank\" href=\"https://www.edx.org/learn/javascript\">Learn JavaScript</a>&nbsp;&mdash;&nbsp;edX</p><p><a target=\"_blank\" href=\"https://www.amazon.com/JavaScript-JQuery-Interactive-Front-End-Development/dp/1118531647\">JavaScript and JQuery: Interactive Front End Web Development</a>&nbsp;&mdash;&nbsp;Jon Duckett</p><p><a target=\"_blank\" href=\"https://www.freecodecamp.org/news/learn-javascript-by-building-7-games-video-course/\">Learn JavaScript By Building Seven Games</a>&nbsp;&mdash;&nbsp;freecodecamp</p>(#CrdNandar Lin)', 'publish', 0),
(61, 30, 3, 'Beautiful Birthday Card Making', 'Htet Myat Naing', '2023-01-08 21:15:29', 'birthday card.JPG', 'Beautiful Birthday Card Making _ DIY Birthday Card Ideas _ Dinesh Arts(720P_HD).mp4', '', '', 'Beautiful Birthday Card Making,Htet Myat Naing,2023/01/08', '<p>Materials:</p><p>&bull; Colour Papers (Ivory Sheets) (Light Turquoise Blue and White)</p><p>&bull; Twisted Paper Rope (Raffia Threads)</p><p>&nbsp;&bull; Glitter Paper</p><p>&nbsp;&bull; Brush Pen</p><p>Measurement:</p><p>&bull; Colour Papers Light Turquoise Blue (A4) White (20cm &times; 9cm)</p><p>*Note: A4 size paper is divided into three equal (10cm ) parts and white paper 20cm &times; 9cm.</p><p>Crd:Dinesh Arts Youtube Channel</p>', 'publish', 0),
(63, 30, 3, 'How to make classy box?', 'Htet Myat Naing', '2023-01-08 23:25:42', 'classy box.JPG', 'How to make classy box _ shirt box tutorial _ hamper box _ gift box _ trending gift box(360P).mp4', '', '', 'How to make classy box?,Htet Myat Naing,2023/01/08', '<p>Crd:noufiz creations Youtube Channel</p>', 'publish', 0),
(64, 30, 3, 'Paper Gift Bags', 'Htet Myat Naing', '2023-01-08 21:38:06', 'paper gift bags.jpg', 'Bolsas de papel para regalo - DIY Manualidades fáciles(720P_HD).mp4', '', '', 'Paper Gift Bags,Htet Myat Naing,2023/01/08', '<p>Crd:Candy Crafts Youtube Channel</p>', 'publish', 0),
(65, 30, 3, 'How to make origami gift box?', 'Htet Myat Naing', '2023-01-08 23:24:42', 'origami gift box.JPG', 'Origami gift box_How to make origami gift box_DIY gift box(720P_HD).mp4', '', '', 'How to make origami gift box?,Htet Myat Naing,2023/01/08', '<p>Crd:JAKS ART &amp; CRAFT Youtube Channel</p>', 'publish', 0),
(66, 30, 3, 'How to make mini Notebook?', 'Htet Myat Naing', '2023-01-08 23:23:28', 'mini notebook.JPG', 'Cara Membuat Notebook _ Buku Catatan Mini Dari Kertas - Diy Mini Notebook One Sheet of paper(720P_HD).mp4', '', '', 'How to make mini Notebook?,Htet Myat Naing,2023/01/08', '<p>Crd:Kak Joe Youtube Channel</p>', 'publish', 0);
INSERT INTO `post` (`post_id`, `post_category_id`, `user_id`, `post_title`, `post_author`, `post_date`, `post_image`, `video_url`, `file_name`, `PDFname`, `post_tag`, `post_content`, `post_status`, `like_number`) VALUES
(67, 30, 3, 'How to make a paper wallet?', 'Htet Myat Naing', '2023-01-08 23:22:19', 'paper wallet.JPG', 'KAĞITTAN KOLAY CÜZDAN YAPIMI -------- KAĞIT CÜZDAN NASIL HAZIRLANIR--ORİGAMİ CÜZDAN(720P_HD).mp4', '', '', 'How to make a paper wallet?,Htet Myat Naing,2023/01/08', '<p>Crd:ETKiNLik SAATi Youtube Channel</p>', 'publish', 0),
(68, 30, 3, 'How to make New Year 2021 Handmade Desk Calendar?', 'Htet Myat Naing', '2023-01-08 23:21:18', 'calender.JPG', 'How to make New Year 2021 Desk Calendar _ DIY Calendar _ Handmade Desk Calendar _ New Year Crafts(720P_HD).mp4', '', '', 'How to make New Year 2021 Handmade Desk Calendar?,Htet Myat Naing,2023/01/08', '<p>Crd:Being Creative Youtube Channel</p>', 'publish', 0),
(69, 30, 3, 'Make Gift Box', 'Htet Myat Naing', '2023-01-08 22:08:34', 'Gift Box.JPG', 'Diy Gift Box _ Gift Ideas _ How To Make Gift Box _ Gift Box Tutorial(720P_HD).mp4', '', '', 'Make Gift Box,Htet Myat Naing,2023/01/08', '<p>Tools &amp; Materials:</p><p>* Hardboard no.30</p><p>* Fancy Paper</p><p>* White Glue (wood glue)</p><p>* Yellow glue (oil based glue)</p><p>* Paper Tape</p><p>* Scissors</p><p>* Cutter</p><p>* Ruler</p><p>Crd:Bunga Giftbox Youtube Channel</p>', 'publish', 0),
(70, 30, 3, 'BT21 Mini Box', 'Htet Myat Naing', '2023-01-08 22:11:48', 'bt21.JPG', 'BTS BT21 DIY GIFT BOX _ BT21 Mini Box _ bts折り紙(720P_HD).mp4', '', '', 'BT21 Mini Box,Htet Myat Naing,2023/01/08', '<p>Crd:Hello arts and crafts Youtube Channel</p>', 'publish', 0),
(71, 31, 3, 'How to Paint Cheery Bloosm?', 'Htet Myat Naing', '2023-01-08 23:20:10', 'cheery bloosm.JPG', 'How to Paint Cherry Blossom _ Technique with Cotton Swab _ Acrylic Painting for Beginners _  133(720P_HD).mp4', '', '', 'How to Paint Cheery Bloosm?,Htet Myat Naing,2023/01/08', '<p>Crd:ART BY LU RANGEL Youtube Channel</p>', 'publish', 0),
(72, 31, 3, 'Full Moon Painting', 'Htet Myat Naing', '2023-01-08 22:19:07', 'moon1.JPG', 'Full Moon Painting _ Acrylic Painting for Beginners _ STEP by STEP _173 _ 보름달 풍경화(720P_HD).mp4', '', '', 'Full Moon Painting,Htet Myat Naing,2023/01/08', '<p>Crd:Joony art Youtube Channel</p>', 'publish', 0),
(73, 31, 3, 'Tulip Flowers Painting', 'Htet Myat Naing', '2023-01-08 22:21:13', 'tulip.JPG', 'Acrylic painting tulip flowers_acrylic painting tutorial_acrylic painting for beginners tutorial(720P_HD).mp4', '', '', 'Tulip Flowers Painting,Htet Myat Naing,2023/01/08', '<p>Crd:easypeasy art Youtube Channel</p>', 'publish', 0),
(74, 31, 3, 'How to Draw Cute Sticker?', 'Htet Myat Naing', '2023-01-08 23:18:56', 'cute sticker.JPG', 'How To Draw Cute Sticker - Simple Sticker Drawing(720P_HD).mp4', '', '', 'How to Draw Cute Sticker?,Htet Myat Naing,2023/01/08', '<p>Crd:Vhh Art Youtube Channel</p>', 'publish', 0),
(75, 31, 3, 'How to Draw Scenery of Moonlight Night by pencil sketch?', 'Htet Myat Naing', '2023-01-08 23:17:58', 'moonlight night.JPG', 'How to Draw Scenery of Moonlight Night by pencil sketch_ Love Birds Scenery Drawing(720P_HD).mp4', '', '', 'How to Draw Scenery of Moonlight Night by pencil sketch?,Htet Myat Naing,2023/01/08', '<p>Drawing Materials:</p><p>Paper : Pencil : Blending Stump : Eraser : Pencil Sharpener : Oil Pastel Color : Soft Oil Pastels : Color Pencil : Water Color : Acrylic Color : Paint Brushes Set : Canvas : Acrylic Painting Set for Gift : Masking Tape: Black Glass Marking Pencil: Glass Marking Color Pencils: Black Art Sign Pen</p><p>Crd:Sayataru Creation Youtube Channel</p>', 'publish', 0),
(76, 31, 3, 'How to draw Scenery of Moonlight Wolf step by step?', 'Htet Myat Naing', '2023-01-08 23:16:24', 'wolf.JPG', 'How to draw Scenery of Moonlight Wolf step by step _ Hihi Pencil(720P_HD).mp4', '', '', 'How to draw Scenery of Moonlight Wolf step by step?,Htet Myat Naing,2023/01/08', '<p>Crd:Hihi Pencil Youtube Channel</p>', 'publish', 0),
(77, 31, 3, 'simple and easy pencil drawing of bunny with butterfly', 'Htet Myat Naing', '2023-01-08 22:35:57', 'bunny.JPG', 'Simple and easy pencil drawing of bunny with butterfly_butterflydrawing with rabbit(720P_HD).mp4', '', '', 'simple and easy pencil drawing of bunny with butterfly,Htet Myat Naing,2023/01/08', '<p>Crd:Taposhi arts Academy Youtube Channel</p>', 'publish', 0),
(78, 31, 3, 'How to draw a Bird Scenery with pencil step by step, Pencil Drawing for beginners?', 'Htet Myat Naing', '2023-01-08 23:15:08', 'birds.JPG', 'How to draw a Bird Scenery with pencil step by step_ Pencil Drawing for beginners(720P_HD).mp4', '', '', 'How to draw a Bird Scenery with pencil step by step, Pencil Drawing for beginners?,Htet Myat Naing,2023/01/08', '<p>Drawing Materials:</p><p>Paper : Pencil : Blending Stump : Eraser : Pencil Sharpener : Oil Pastel Color : Soft Oil Pastels : Color Pencil : Water Color : Acrylic Color : Paint Brushes Set : Canvas : Acrylic Painting Set for Gift</p><p>Crd:Sayataru Creation Youtube Channel</p>', 'publish', 0),
(79, 31, 3, 'Cute bird in cap pencil drawing', 'Htet Myat Naing', '2023-01-08 22:42:05', 'birds in cap.JPG', 'Cute Bird in cap pencildrawing_TaposhiartsAcademy(720P_HD).mp4', '', '', 'Cute bird in cap pencil drawing,Htet Myat Naing,2023/01/08', '<p>Crd: Taposhi arts Academy Youtube Channel</p>', 'publish', 0),
(80, 32, 3, 'နေပျော်တဲ့ ဘဝဆိုတာ မရှိဘူး ', 'Htet Myat ', '2023-01-14 04:43:43', '1.jpg', '', '', '', 'နေပျော်တဲ့ ဘဝဆိုတာ မရှိဘူး ,Htet Myat ,2023/01/14', '<p>?ဘဝ မှာ...နေသားကျသွား တဲ့အခါ...</p><p>ဒဏ်ရာတွေက သင်ခန်းစာအဖြစ် ပြောင်းလဲတတ်လာတယ်။နေပျော်တဲ့ဘဝဆိုတာ မရှိပါဘူး နေတတ်အောင်နေရင်းက အသားကျသွားတာပါ။</p><p>&nbsp;</p><p>?ဘဝက ခဏပါလိုသိသွားတဲ့တနေ့...</p><p>ရှင်သန်ခြင်းတွေမှာ အရောင်သိပ်မဆိုးဖြစ်တော့ဘူး။</p><p>&nbsp;</p><p>?ဘဝကပေးတဲ့ သင်ခန်းစာတွေကြောင့်</p><p>ရင့်ကျက်သင့်သလောက် ရင့်ကျက်ပြီး</p><p>ကိုယ့်အတွက် သီးသန့် ဖြစ်တည်ပေးနိူင်မယ့် သူတွေအတွက်ပဲ အချိန်ပေးဖြစ်လာတယ်။</p><p>&nbsp;</p><p>?လတွေကပေးတဲ့သင်ခန်းစာတွေ ကြောင့်</p><p>ပေါင်းသင်းသင့် တဲ့လူတွေ ကိုပေါင်းပြီး</p><p>မပေါင်းသင်းအပ်တဲ့ သူကို ရှောင်တတ်လာတယ်။</p><p>&nbsp;</p><p>?ဘယ်သူက ဘယ်လိုရှိတယ် ဆိုတာတွေထက် ကိုယ်တိုင် ဘယ်လိုရှင်သန်နေထိုင်ရမယ်ဆိုတာက အဓိကပိုကျလာတယ်။</p><p>&nbsp;</p><p>?အေးချမ်းခြင်းတွေကို မြတ်နိူးတဲ့အခါ</p><p>ပူလောင်ခြင်းတွေကို ရှောင်ရှားလိုက်ရတာပဲမဟုတ်လား???တရား ကိုသိတဲ့သူက</p><p>အေးချမ်းခြင်းကို နားလည်တာပါပဲ...။</p><p>&nbsp;</p><p>?လတွေနဲ့ နေသား တကျရှိဖို</p><p>ကိုယ်တိုင် ပြောင်းလဲစရာမလိုပါဘူး</p><p>ကိုယ့်စရိုက်နဲ့ သူ့စရိုက်မတူတဲ့အခါ</p><p>ရေစီးတာချင်းတူပေမယ့် ပေါင်းစပ်လိုမရတဲ့မြစ်တွေ၊ပင်လယ်တွေရှိပါတယ်... ။</p><p>လူတွေလည်း ထိုအတူပါပဲ ကိုယ်တိုင်က ကောင်းအောင်နေလိုက်ရင် မကောင်းတဲ့သူက သူ့အလိုလိုထွက်သွားတာပါပဲ။</p><p>&nbsp;</p><p>?လတွေ အလိုကျအတိုင်း</p><p>ပြောင်းလဲနေထိုင်ဖို မလိုပါဘူး</p><p>ကိုယ်ပုံစံလေးနဲ့ကိုယ်နေ ရင်ဘက် ချင်းတူရင် ဘယ်လိုလူပဲဖြစ်ဖြစ်ပေါင်းသင်းလိုရပါတယ်။</p><p>&nbsp;</p><p>?သက ကိုယ်မဟုတ်တဲ့ လောကကြီးမှာ</p><p>အပေါ်ယံ မျက်နှာဖုံးတွေက ပိုများနေတတ်တယ် စာအုပ်အဖုံးလေးကြည့်ရုံနဲ့</p><p>စာအုပ်တစ်အုပ်ရဲ့တန်ဖိုးကို မသိနိူင်သလိုပဲ</p><p>လူတစ်ယောက်ရဲ့ ကိုယ်ကျင့်သိက္ခာတရားဆိုတာ လုပ်ရပ်တွေနဲ့သက်သေပြတာပါ။</p><p>&nbsp;</p><p>?ဘယ်သူဘာပဲ လုပ်လုပ်</p><p>ကိုယ့်လုပ်ရပ်တွေ အကျည်းမတန်ဖိုလိုတယ်</p><p>ဘယ်သူဘယ်လို ပုံစံနဲ့ရှင်သန်နေပါစေ</p><p>ကိုယ့်ရဲ့ရှင်သန်ခြင်းတွေက သိက္ခာရှိဖိုလိုတယ်။</p><p>&nbsp;</p><p>လေးစားစွာဖြင့်</p><p>မေဆု(ရာမညမြေ)22.2.2022</p><p>#MayHsuyarmanyamyae. .crd.</p><p>#မေဆုရာမညမြေအတွေးစာစုလေးများ</p><p>&nbsp;</p>', 'publish', 0),
(81, 32, 3, 'သိမှတ်ဖွယ်ရာ', 'Htet Myat ', '2023-01-14 04:43:07', '2.jpg', '', '', '', 'သိမှတ်ဖွယ်ရာ,Htet Myat ,2023/01/14', '', 'publish', 1),
(82, 32, 3, 'သိမှတ်ဖွယ်ရာ', 'Htet Myat ', '2023-01-14 04:42:50', '3.jpg', '', '', '', 'သိမှတ်ဖွယ်ရာ,Htet Myat ,2023/01/14', '', 'publish', 0),
(83, 32, 3, 'အခက်အခဲဆိုတာ လူတိုင်းမှာရှိကြတယ် လူတိုင်းမှာ မရှိတာက ကိုယ်ချင်းစာတရားပါ။', 'Htet Myat Naing', '2023-01-09 10:42:34', '4.jpg', '', '', '', 'အခက်အခဲဆိုတာ လူတိုင်းမှာရှိကြတယ် လူတိုင်းမှာ မရှိတာက ကိုယ်ချင်းစာတရားပါ။,Htet Myat Naing,2023/01/09', '<p>ကိုယ်တိုင် မခံစားဖူးသရွေ့တော့</p><p>လူတစ်ဖက်သားရဲ့ ခံစားချက်ကို နားလည်မှာမဟုတ်ဘူး။</p><p>&nbsp;</p><p>ကိုယ်ပြောခဲ့၊ကိုယ်ပြုခဲ့တဲ့အပြုအမူအတိုင်း ကိုယ်တိုင်မကြုံဖူးတဲ့အခါ အဲ့ဒီစကားလုံးတိုင်း အပြုအမူတိုင်းက တစ်ဖက်လူဘယ်လောက်ထိခံစားရမလဲဆိုတာ သ်ိမှာမဟုတ်ဘူး။</p><p>&nbsp;</p><p>နာကျင်ရတဲ့ ဒဏ်ကိုခံစားဖူးတော့ နည်းနည်းလေးထိခိုက်မိတာနဲ့ ကိုယ်ချင်းစာပေးတတ်တယ်။</p><p>&nbsp;</p><p>ဆုံးရှုးရတဲ့ ခံစားချက်ကို နားလည်တော့ ဘယ်အရာမဆိုတန်ဖိုးထားတတ်လာတယ်။</p><p>&nbsp;</p><p>စကားလုံးတိုင်းကို နှလုံးသားနဲ့ခံစားတတ်လာတော့ တစ်ဖက်သားကိုပြောတဲ့အခါတိုင်း အမှားမပါအောင် ဂရုစိုက်တတ်လာတယ်။</p><p>&nbsp;</p><p>ဒီလိုပဲ...ဘဝမှာ ဒါလေးပြောလိုက်တာကို&quot;ဒီလောက်ခံစားရလား?</p><p>ဒီလောက်လေးကို ဒီလိုနာကျင်ရလားဆိုတဲ့သူတွေကို အံ့သြမိတယ် ကိုယ်တိုင်အပြောမခံရ၊ကိုယ်တိုင်မကြုံရတော့ တစ်ဖက်လူရဲ့ခံစားချက်ကို ကိုယ်ချင်းမစာနာတတ်ကြတာပါ။</p><p>&nbsp;</p><p>ဒါကြောင့် တစ်ခုခုပြောမယ်ဆိုရင်သတိလေးထားပါ သူများကိုမှိချိုး၊မျှစ်ချိုးပြောခဲ့သလို ကိုယ်ကိုယ်တိုင်မှန်ထဲကြည့်ပြီး ခံစားနိူင်သလားလို ကိုယ့်ကိုကိုယ်ပြန်မေးကြည့်ပါ။</p><p>&nbsp;</p><p>ဘယ်အရာပဲ ဖြစ်ဖြစ်</p><p>အစွန်းရောက်တိုင်း မကောင်းသလို တယူသန်တိုင်းလည်းမကောင်းဘူး သူ့ဘက် ကိုယ့်ဘက်မျှကြည့်တတ်မှ လူပီသတဲ့စိတ်ရှိတာပါ။</p><p>&nbsp;</p><p>လေးစားစွာဖြင့်</p><p>#MayHsu(ရာမညမြေ)30.10.2022</p><p>#မေဆုရာမညမြေအတွေးစာစုလေးများ</p><p>#MayHsuyarmanyamyae</p><p>Credit</p>', 'publish', 0),
(84, 32, 3, 'ဖျောက်ရအခက်ဆုံးက ဗီဇပါ', 'Htet Myat ', '2023-01-14 04:42:18', '5.jpg', '', '', '', 'ဖျောက်ရအခက်ဆုံးက ဗီဇပါ,Htet Myat ,2023/01/14', '<p>အကျင့်မတူစရိုက်မတူ&quot;</p><p>အသိမတူ&quot;</p><p>စိတ်မတူ&quot;</p><p>သူနှင့်အတူယှဉ်တွဲနေဖို ဘယ်လိုမှမဖြစ်နိုင်ပါဘူး &quot;</p><p>&nbsp;</p><p>ကျွန်တော်မှာမာနရှိတယ်&quot;</p><p>ဒါပေမဲ့ ....ဘဝင်မမြင့် ဘဝမေမ့တတ်ဘူး.&quot;</p><p>&nbsp;</p><p>လူမှန်ရင် အတ္တမကင်းကြပေမဲ့</p><p>ကျွန်တော်တစ်ကိုယ်ကောင်း မဆန်တတ်ဘူး.&quot;</p><p>&nbsp;</p><p>စကားပြော မချိုသာပေမဲ့ ကျွန်တော်မရိုင်းဘူး &quot;</p><p>စိတ်ဓါတ်ပျော့ညံ့ပြီး ခံစားလွယ်ပေမဲ့ ခေါင်းတော့မာတယ်..&quot;</p><p>&nbsp;</p><p>&quot;ပညာမတတ်ပေမဲ့ &quot;</p><p>စာနာတတ်အောင် ကျွန်တော်မိဘတွေက</p><p>သင်ပေးထားတယ်...</p><p>&nbsp;</p><p>အမြဲတမ်း ဖြူစင်နေသူမဟုတ်ခဲ့ပေမဲ့ &quot;</p><p>ရိုးရှင်းမှုကိုပဲ နှစ်သက်မြတ်နိုးတယ်.&quot;</p><p>&nbsp;</p><p>&quot;လူမချမ်းသာပေမဲ့&quot;</p><p>&quot;စေတနာမမွဲဘူး&quot;</p><p>ကျွန်တော်သဒ္ဓါတရားကို ခိုင်မြဲအောင် အမြဲကြိုးစားနေပါတယ် ...</p><p>&nbsp;</p><p>&quot;လူကဆိုးချင် ဆိုးမယ်&quot;</p><p>စာရိတ္တကောင်းအောင်ကြိုးစားပြီးနေပါတယ်...</p><p>လူပါးမဝဘူး &quot;</p><p>&nbsp;</p><p>အမြဲမမှန်ခဲ့ဘူးပေမဲ့ .&quot;</p><p>အမှားတွေထဲမှာတော့</p><p>ကျွန်တော်ပျော်မနေတတ်ဘူး&quot;</p><p>&nbsp;</p><p>ရုန်းထွက်ခွင့်ပြုပါ။</p><p>Credit:</p>', 'publish', 0),
(85, 32, 3, 'သည်းခံတယ်ဆိုတာ', 'Htet Myat ', '2023-01-14 04:39:58', '6.jpg', '', '', '', 'သည်းခံတယ်ဆိုတာ,Htet Myat ,2023/01/14', '<p>အတိုင်းအတာ တစ်ခုအထိပဲသည်းခံဆိုတာ</p><p>အတိုင်းအတာထက်လွန်ကဲလာရင်</p><p>ဒေါသထွက်ပြီး မခံနိုင်တဲ့စိတ်တွေနဲ့</p><p>ပေါက်ကွဲပစ်လိုက်ဖို ပြောတာမဟုတ်ဘူး</p><p>ဥပေက္ခာပြုလိုက်ဖိုကိုပြောတာ။</p><p>&nbsp;</p><p>သူများနဲ့ ရန်ပြန်ခံဖြစ်တယ်ဆိုတာ</p><p>ကိုယ့်ရဲ့စိတ်ကို သူနဲ့တန်းတူအောင်</p><p>အောက်ချလိုက်ချင်းပဲဖြစ်တယ်။</p><p>&nbsp;</p><p>ကိုယ်ရဲ့ စိတ္ကို တစ်စုံတစ်ယောက်က</p><p>ဝမ်းနည်းအောင်လည်း လုပ်လိုရတယ်</p><p>ဝမ်းသာအောင်လည်းလုပ်လိုရတယ်</p><p>စိတ်ဒုက္ခရောက်အောင်လည်း</p><p>လုပ်လိုရတယ်ဆိုရင်</p><p>ကိုယ်ကသူများစိတ်နဲ့</p><p>အသက်ရှင်နေတာဖြစ်သွားပြီ။</p><p>&nbsp;</p><p>ကိုယ့်ကိုတစ်စုံတစ်ယောက်က</p><p>လာကဲ့ရဲ့တယ်ဆိုရင်</p><p>ကိုယ္က ဘယ်လိုလူမျိုးလည်းဆိုတာ</p><p>သူဘယ်လိုထင်ထင်</p><p>သူကဘယ်လိုလူမျိုးလည်းဆိုတာက</p><p>ပေါ်လွင်နေပြီ။</p><p>&nbsp;</p><p>ကိုယ့်ကို အပြစ်ပြောနေတဲ့သူတွေက</p><p>အရမ်းကျေးဇူးတင်ဖိုကောင်းတယ်</p><p>သူတိုပြောလိုက်မှ ကိုယ်မှားနေတယ်ထင်တဲ့</p><p>အရာတွေကို ပြန်ပြီးပြုပြင်လိုရတာပေါ့။</p><p>&nbsp;</p><p>သူ့ရဲ့အမှားတွေကို အပြစ်မပြောခင်</p><p>ကိုယ့်မှာ အဲ့အမှားမျိုးရှိနေမလားဆိုတာ</p><p>အရင်ပြန်ပြီး စဉ်းစားပါ</p><p>သူများအမှားတွေကို လိုက်ပြီးမပြောခင်</p><p>ကိုယ့်မှာ အမှားမရှိအောင် အရင်လုပ်ပါ။</p><p>&nbsp;</p><p>ကိုယ့်ကိုယ်ကိုယ် ယုံကြည့်မှုရှိရှိနဲ့နေတဲ့သူဟာ</p><p>ကိုယ့်အလုပ်ကို</p><p>အမြဲတမ်းအကောင်းဆုံးဖြစ်အောင်လုပ်တယ်</p><p>ကိုယ့်ရဲ့လုပ်ဆောင်ချက်အပေါ်မှာလည်း</p><p>အမြဲတမ်းစိတ်ကျေနပ်မှုရှိတယ်။</p><p>ကိုယ့်စိတ်ကိုအမြဲတမ်းပျော်အောင်ထားတယ်</p><p>စိတ္ကို ရှင်းရှင်းလင်းလင်းပဲထားတယ်</p><p>သူတပါး ကဲ့ရဲ့တာတွေ</p><p>ချီးမွမ်းတာတွေအပေါ်မှာ</p><p>အချိန်ကုန်မနေဘူး။</p><p>&nbsp;</p><p>ခွင့်လွတ်တတ်တဲ့စိတ်ဆိုတာ</p><p>လောကမှာ အရဲရင့်ဆုံး သတ္တိအရှိဆုံးပဲ။</p><p>&nbsp;</p><p>သူတပါးကို အနိုင်လိုချင်တဲ့စိတ်ဆိုတာ</p><p>ကလေးလေးတစ်ယောက်ရဲ့ စိတ်ပဲ</p><p>သူတပါးရဲ့အပြစ်တွေကို ပြောတတ်တဲ့သူဟာ</p><p>ရင့်ကျက်မှု မရှိသေးတဲ့သူပဲ။</p><p>&nbsp;</p><p>ကိုယ့်ကို ဘယ်လိုလူစားလည်းလို</p><p>လာပြီးသတ်မှတ်တတ်တဲ့သူတွေဟာ</p><p>သူတိုကိုယ္သဴတို အဲ့လိုလူစားဆိုတာကို</p><p>ပြောပြလိုက်တာပါပဲ။</p><p>&nbsp;</p><p>ကိုယ့်ကို တိုက်ခိုက်လာတဲ့သူတွေကို</p><p>ပြန်ပြီးတော့ မတုန့်ပြန်တာ</p><p>ကြောက်တာလည်း မဟုတ်သလို</p><p>အရမ်းကြီးရင့်ကျက်သွားတာလည်းမဟုတ်ဘူး</p><p>တိတ်ဆိတ်ခြင်းရဲ့ အေးချမ်းမှုကို သိထားလို။</p><p>&nbsp;</p><p>#မေတ္တာများစွာဖြင့်</p><p>#nanthanthanhtay (ဘဝစာပေ)</p><p>#credit</p>', 'publish', 0),
(86, 32, 3, 'စေတနာနဲ့ထိုက်တန်တဲ့သူကိုသာပေးပါ။', 'Htet Myat ', '2023-01-14 04:39:11', '7.jpg', '', '', '', 'စေတနာနဲ့ထိုက်တန်တဲ့သူကိုသာပေးပါ။,Htet Myat ,2023/01/14', '<p>?တစ်ခါက လယ်သမားကြီးဆီမှာ? မြင်းတစ်ကောင်နဲ့ နွား?တစ်ကောင် ရှိတယ်တဲ့ တစ်နေ့မှာ နွား?က ညည်းညူရင်း မြင်း?က ဒီလိုစကားဆိုသတဲ့</p><p>&quot;အိုအဆွေမြင်း?&quot; &quot;သင်ကလယ်သမားကြီးအိမ်မှာနေရတာချင်းတူပေမယ့်&quot; ကျွန်တော်နဲ့တော့--- တစ်ခြားစီပါ&quot; တစ်နေ့တစ်နေ့ နုပေ့ဆိုတဲ့မြက်တွေစားလိုက် အိပ်လိုက်နဲ့ ရံဖန်ရံခါ သခင်သွားလိုရာခရီးပိုဖို ဂုံနီတွေနဲ့အလှဆင်ပြီးလှလှပပနဲ့ခရီးတစ်ခုကို&zwnj;ပိုပေးပြီးတာနဲ့နားရတာပါပဲ&quot;</p><p>&nbsp;</p><p>?&quot;ကျွန်ပ်မှာတော့ တစ်နေ့တစ်နေ့ထမ်းလိုက်ရတဲ့ ထွန်တုံး&zwnj;&quot;ချွေးအသီးသီးကျပြီးမှ နားရတာဗျား တစ်နေကုန်အောင်အလုပ်လုပ်ရတော့ ညောင်းကိုက်နေတာပါပဲ ခင်ဗျားနဲ့တော့တခြားစီပါ&quot;</p><p>&nbsp;</p><p>?လ&zwnj;ပြော လာတဲ့&quot; ?နား&quot; ရဲ့စကားကိုကြားရတော့&quot; ?မြင်း&quot;ကလဲ စိတ်မကောင်းဘူးဒါနဲ့သူ့ သူငယ်ချင်းနွားကို ကူညီချင်တဲ့စိတ်နဲ့ ဒီလိုပြောလိုက်တယ် အဆွေ ?နား အကယ်၍သင့်ကို သခင်ကလယ်ထဲသွားဖိုလာခေါ်တဲ့အခါ သင်နေမကောင်းချင်ဟန်ဆောင်ပြီး မထနိူင်ထနိူင်သကဲ့သိုနေပါ ဒါမှသင်လဲမပင်ပန်းတော့မှာပေါ့လိုပြောလိုက်တယ်။</p><p>&nbsp;</p><p>?ဒလိုနဲ့မနက်ရောက်လာတော့ သခင်ကနွား?ကလယ်ထွန်ဖိုလာဆွဲတယ်ဒါနဲ့နွားကလည်း မြင်း?ပြောထားသလိုနေတော့ နောက်ဆုံးလယ်က မထွန်ရင်မရတဲ့အခြေအနေမို မြင်းကိုပဲ လယ်ထွန်ဖိုခေါ်သွားလိုက်ရတယ်။</p><p>&nbsp;</p><p>?မြင်း?က လယ်ထဲက ပြန်လာတော့ မောပန်းပြီး &zwnj;အတော်လေး နုံးချည့်လာတယ် ဒါကိုနွား?မြင်တော့ &zwnj;&quot;အသင်ယုံပြီမဟုတ်လား ကျွန်ပ်ဘယ်လောက်ထိပင်ပန်းတယ်ဆိုတာ&quot; ... ဒါနဲ့ဆက်ပြီး ကျွန်ပ်ရဲ့တာဝန်ကို ဆက်လက်ထမ်းဆောင်ပေးပါလိုပြောသတဲ့...</p><p>&nbsp;</p><p>?ထစကားကိုမြင်းကြားရတော့ အတော်လေးစိတ်ထိခိုက်သွားတယ်</p><p>ဒီလိုနဲ့မြင်း?က ပြန်ပြောလိုက်တယ် အဆွေနွား? အသင့်ရဲ့တာဝန်ကို ကျွန်ပ်ကထမ်းဆောင်ရတာ ဘာမှမဖြစ်ပါဘူး ဒါပေမယ့်သခင်က အသင်ဒီလိုသာအလုပ်မလုပ်နိူင်ရင် သားသတ်ရုံကိုပိုမယ်လိုပြောသံကြားတော့ အဆွေအတွက် အကျွန်ပ်စိတ်မကောင်းပါဘူးဗျား &quot;</p><p>&nbsp;</p><p>?ဒလိုကြားလိုက်တာနဲ့နွားလည်း ခုန်ပေါက်ပြေးလွှားပြရင်းသူ့သခင်ကို နေကောင်းကြောင်း သက်သေပြဖိုအတွက်အစွမ်းကုန်ကျိုးစားပါတော့တယ်။ပုံပြင်လေးကတော့ ဒီလောက်နဲ့အဆုံးသတ်ပါရစေ။</p><p>&nbsp;</p><p>?တစ်ခါတလေမှာ ကျွန်မတိုတွေဟာ ဒီလိုလူမျိုးတွေနဲ့တွေ့ရတတ်ပါတယ်။</p><p>&nbsp;</p><p>?စေတနာထားပါ ဒါပေမယ့်ထိုက်တန်တဲ့သူ&zwnj;ဖြစ်ပါစေ။လိုတာထက် ပိုပေးမိရင် မိမိရဲ့စေတနာက တန်ဖိုးမသိတဲ့သူတွေလက်ထဲမှာ&nbsp; အပေါစားဆန်သွားတတ်ပါတယ်။</p><p>&nbsp;</p><p>?အားနာပါ လိုတာထက်မပိုပါနဲ့</p><p>သူများဝန်ကို ထမ်းပိုးရလောက်တဲ့အထိ အားမနာမိပါစေနဲ့။</p><p>အားနာတတ်ခြင်းကအသွားနှစ်ဖက်ပါတဲ့ဓားလိုပါပဲ ဘယ်နေရာရပ်ရပ် မိမိကိုယ်ပဲ ဒုက္ခရောက်စေတဲ့အရာပါ။</p><p>&nbsp;</p><p>?ဒါကြောင့် ကိုယ့်ဆီက မနေတတ်လို စေတနာပဲဖြစ်ဖြစ်၊ချစ်ခြင်းမေတ္တာပဲဖြစ်ဖြစ် ပေးမိတဲ့အခါ ထိုက်တန်တဲ့သူဖြစ်ဖိုလိုပါတယ်။</p><p>&nbsp;</p><p>ချစ်ခြင်းများစွာဖြင့်</p><p>MayHsu(ရာမည&zwnj;မြေ)6.1.2023</p><p>#MayHsuyarmanyamyae</p><p>#မေဆုရာမညမြေအတွေးစာစုလေးများ</p><p>Credit</p>', 'publish', 0),
(87, 32, 3, 'လူပီသတဲ့လူ ', 'Htet Myat ', '2023-01-14 04:38:53', '8.jpg', '', '', '', 'လူပီသတဲ့လူ ,Htet Myat ,2023/01/14', '<p>လူတိုင်းကတော့ ပခုံးနှစ်ဖက်ကြား ခေါင်းပေါက်တာချင်း အတူတူပါပဲ။ဒါပေမယ့် လူတွေဟာ တစ်ယောက်နဲ့တစ် ယောက် မတူကြဘူး။ အသိတွေမတူကြဘူး၊ အမြင်တွေ မတူကြဘူး၊ ဘဝတွေလည်း မတူကြဘူး၊ ခံယူချက်တွေလည်း ကွဲပြားကြတယ်။</p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ကိုယ့်မိဘတွေက ဘယ်သူတွေ ဖြစ်ရမယ်၊ ဘယ်လိုမိသားစုကနေ မွေးဖွားလာရမယ်ဆိုတာကို ကျွန်တော်တို မရွေးချယ်နိုင်ကြဘူး။ တစ်ဦးချင်းစီရဲ့ အတိတ်ကံ အရ</p><p>ဖြစ်တည်လာတာ၊ ကိုယ်ရုပ်က ဘယ်လိုရုပ်မျိုး ဖြစ်ရမယ်ဆိုတာကို ဘယ်သူကမှ ဆုံးဖြတ်ခွင့်မရှိပဲ လူ့လောကထဲ ရောက်လာရတာပါ။</p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ဘဝဆိုတာ တိုတိုလေးပါ လိုဆိုကြတယ်။ အဲဒီဘဝတိုတိုလေးမှာ ကျွန်တော်တို ဘယ်အချိန်ထိ အသက်ရှင်မယ်၊ ဘယ်အချိန်ထိပဲ နေထိုင်ရမယ်ဆိုတာကို ဘယ်သူမှ မသိကြဘူး။ ရတဲ့အချိန် ကိုယ့်ရဲ့ လက်ရှိအချိန်တွေမှာ အတက်နိုင်ဆုံးနဲ့ အကောင်းဆုံးဖြစ်အောင် နေသွားနိုင်ဖိုဆိုတဲ့ အချက်ကသာ အရေးအကြီးဖြစ်တယ်ဆိုတာ ထင်ရှားပါတယ်။</p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ကိုယ့်ကိုယ်ကိုယ် မြှင်တင်နေတဲ့သူဟာ လူပီသတဲ့သူပါပဲ။ လူပီသတယ်ဆိုတာ အသိဥာဏ် မြင့်မားရမယ်၊ အသိမြင့်တယ်ဆိုတာ ဥာဏ်ရည်ဥာဏ်သွေးမြင့်မားခြင်းတစ်ခုတည်းကိုပဲ ဆိုလိုတာ မဟုတ်ပါဘူး ၊ ကိုယ်လုပ်တဲ့ အလုပ်ဟာ ကောင်းလား ၊ဆိုးလား ၊ သင့်တော်လား၊ မသင့်တော်ဘူးလား ၊ ဘယ်သူတွေကိုတော့ ထိခိုက်မလဲ ဒါတွေကို စဥ်းစားတက်ရုံနဲ့ ပညာရှိသူလို သတ်မှတ်နိုင်ပါတယ်။</p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; နောက်တစ်ချက်ကတော့ ကိုယ့်ပတ်ဝန်းကျင်အတွက် ကြီးကြီးမားမား မဟုတ်တောင် ကိုယ်ကျွမ်းကျင်တာ ဒါမှမဟုတ် ကိုယ်လုပ်ပေးနိုင်တာ တစ်ခုခုကို အလုပ်အကျွေးပြုနေရမယ်။ ဆရာဝန်ကြီး အင်ဂျင်နီယာကြီး ဖြစ်မှ အကျိုးပြုနိုင်တာ မဟုတ်ပါဘူး၊ ကျွန်တော်တိုရဲ့ အလုပ်က လမ်းဘေးက အမှိက်သိမ်းသမား ဖြစ်ပါစေ က်ိယ်လုပ်တဲ့ အလုပ်ကို စေတနာပါပါနဲ့ အကောင်းဆုံးဖြစ်အောင် လုပ်တာဟာ လူတွေကို ကျေးဇူးပြုတာပါပဲ။</p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; လူတကာရှေ့ လူလုံးထွက်ပြမှ ကိုယ်ဘာလုပ်နေတယ်၊ ဘာတွေလုပ်ပြီးပြီ ဆိုတာကို ကြော်ငြာနေမှ တချိုက သူတိုကိုယ်ကိုယ် သူတို လူရာဝင်မယ်လို ထင်တက်ကြတယ်။ တကယ်တမ်း အရေးကြီးတာက ကိုယ့်ပတ်ဝန်းကျင် ကိုယ်ကျရာ နေရာလေးမှာ စိတ်ကောင်းလေးထားပြီး နေတက်ဖိုပါပဲ။ သူများတွေ အသိအမှတ်ပြုမှ၊ အထင်ကြီးကြမှ ကိုယ့်အလုပ်က တန်ဖိုးရှိတာ မဟုတ်ပါဘူး။</p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; အဓိက ကျတာက အခြေအနေတိုင်းမှာ စိတ်ကလေးကို သမာသမတ်ကျအောင်၊ အပြုသဘောမြင်တက်အောင် ထားတက်ဖိုပါပဲ။ ဥပမာ- ကိုယ့်ရုပ်ရည်နဲ့ ပတ်သတ်လို ကိုယ်ပြောင်းလဲလို မရတဲ့အရာတွေရှိရင်</p><p>(အတော်များများသော အစိတ်အပိုင်းတွေကို ပြောင်းလဲပစ်လိုရနေပါပြီ) အားနည်မနေပဲ၊ ဝမ်းနည်းမနေပဲ ကိုယ့်ထက်ပိုဆိုးတဲ့သူတွေ ရှိသေးပါလားဆိုတာကိုလည်း မြင်မယ်၊ တရားသဘောတွေကိုလည်း အတန်အသင့်နှလုံးသွင်းတက်တဲ့အလေ့အကျင့်မျိုး ရလာရင် သိပ်ပြီး စိတ်သောက ရောက်တော့မှာ မဟုတ်ပါဘူး။</p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ကိုယ့်ကိုယ်ကိုယ် မကျေနပ်တဲ့စိတ်၊ သူများနဲ့ နှိင်းယှဥ်ပြီး ညိုးငယ်တဲ့စိတ်တွေဟာ ဒီနေ့ခေတ်မှာ ပိုပြီး ဖြစ်ဖိုများပါတယ်။ သူများတွေတော့ ဘယ်လိုတွေ နေနိုင်တယ်၊ ဘယ်လိုစားနိုင်တယ်၊ ဘယ်ကိုသွားနိုင်တယ်၊ ဘယ်လောက်ချောမောတယ်ဆိုတာတွေကို နေ့စဥ် ဆိုရှယ်မီဒီယာတွေအပေါ်မှာ အမြဲ မြင်နေရတော့ ကိုယ်နဲ့ ယှဥ်ပြီး စိတ်ပျက်မိဖို များပါတယ်။</p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; အဲ့ဒီလို&nbsp; မိမိကိုယ်ကိုယ် ဘဝင်မကျတဲ့ရောဂါက ကြီးလာရင် သူတစ်ပါးအပေါ် ဒေါသနဲ့ မပြောသင့်တာတွေပြောမိတာ၊ ကိုယ်မလုပ်သင့်တာတွေကို မလုပ်သင့်တဲ့ လူတွေအပေါ် လုပ်မိတာ၊ ကိုယ့်အလုပ်အပေါ် အာရုံမစိုက်နိုင်တာတွေ ဖြစ်လာတယ်။ဒါကြောင့် ဒီစိတ်ဟာလည်း ကျွန်တော်တိုရဲ့ ကောင်းတဲ့သဘောထားတွေကို ပိတ်ဆိုထားသလို ဖြစ်နေတယ်။</p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; မေတ္တာစိတ်ကလေးနဲ့ အမြဲနေနိုင်အောင် ကြိုးစားမယ်၊ ဒေါသကို အတက်နိုင်ဆုံး ထိန်းမယ်၊ ကိုယ့်ဝါဿနာကို ဖြစ်မြောက်အောင်လုပ်မယ်၊ လျော့တိလျော့ရဲ ပေါ့ပေါ့ဆဆ ဘဝကို မနေဘူး၊ သာမန်ကာလျှံကာ အလုပ်တစ်ခုကို မလုပ်ဘူး၊ ဘာပဲ ဖြစ်ဖြစ် လေးလေးနက်နက် လုပ်တယ်၊ သူတစ်ပါး နာကျင်အောင် မျက်ရည်ကျစေမယ့် အပြုအမူမျိုး၊ မပြောအဆိုမျိုးကို ရှောင်မယ်။</p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ဒါတွေကို လုပ်ဖို ကြိုးစားနေရင်ပဲ လူပီသတဲ့သူလို ဆိုနိုင်ပါတယ်။ မိမိရဲ့ အရည်အချင်းတွေ၊ ဥာဏ်ရည်တွေကို ချည်း ကြည့်ပြီး ကိုယ့်ကိုယ်ကိုယ် မဆုံးဖြတ်ပါနဲ့ ၊ ကိုယ့်ရဲ့ စိတ်သဘောထားကောင်းမှု၊ ရိုးသားမှုနဲ့ ကိုယ်ချင်းစာစိတ်တွေအပေါ်လည်း တန်ဖိုးထားပေးပါ။ ဂုဏ်ပြုပေးပါ။ ဒါမှသာ ပိုကောင်းတဲ့သူဖြစ်အောင် အားထုတ်ချင်စိတ် ဖြစ်လာမှာပါ။</p><p>&nbsp;</p><p>photo crd</p><p>#crdtooriginalwritter</p>', 'publish', 0),
(88, 32, 3, 'သိမှတ်ဖွယ်ရာ', 'Htet Myat ', '2023-01-14 04:38:29', '9.jpg', '', '', '', 'သိမှတ်ဖွယ်ရာ,Htet Myat ,2023/01/14', '<p>ကိုယ့်ထက်တော်လို</p><p>မနာလိုမဖြစ်ပါနဲ့... လေးစားပါ။</p><p>အားကျပြီး အတုယူပါ။</p><p>&nbsp;</p><p>ကိုယ့်လောက်မတော်လိုလည်း</p><p>အထင်မသေးပါနဲ့ လူတိုင်းလူတိုင်းမှာ</p><p>လေးစားမူနဲ့ ထိုက်တန်ပါတယ်...။</p><p>&nbsp;</p><p>#crd_to_the_original_writer</p>', 'publish', 0),
(89, 32, 3, 'နေပျော်ပါစေ', 'Htet Myat ', '2023-01-14 04:38:11', '10.jpg', '', '', '', 'နေပျော်ပါစေ,Htet Myat ,2023/01/14', '<p>သူတစ်ပါး ကိုယ့်ထက်သာသွားမှာ ကြောက်တဲ့စိတ်က မနာလိုဝန်တိုတဲ့စိတ်ပါ ဒီစိတ်ကြောင့်ပဲ အေးချမ်းနေပြီးသားစိတ်က အလိုလိုနေရင်း အတ္တတွေလွှမ်းမိုးပြီးပူလောင်နေရတတ်ပါတယ်။</p><p>&nbsp;</p><p>ပျော်ရွှင်ဖို&nbsp; ဘယ်သူမှ သင့်ကိုမစွမ်းဆောင်နိူင်ပါဘူး ဒါပေမယ့်သင်ကိုယ်တိုင်မပျော်သရွေ့ဘယ်နေရာရောက်ရောက် စိတ် ချမ်းသာမှုနဲ့ဝေးနေမှာပါ။</p><p>&nbsp;</p><p>တစ်ခါတလေ မျှတွေးတတ်တဲ့စိတ်နဲ့</p><p>အရာရာကိုယှည်ကြည့်လိုက်တဲ့အခါ</p><p>တစ်ချိုအရာတွေက ကိုယ့်မသိစိတ်က ဖြစ်ပေါ်လာ ပြီး ကိုယ့်သိစိတ်နဲ့ မဆင်ချင်မိလိုက်တာတွေ ဖြစ်တတ်ပါတယ်။</p><p>&nbsp;</p><p>ဘဝဆိုတာ ပျော်ပျော်နေဖိုထက် ပိုပြီးလေးနက်ရမယ်။သူတစ်ပါး အပေါ် ကောက်ကျစ် ယုတ်မာတဲ့စိတ်မရှိခြင်း မနာလိုဝန်တိုစိတ်မရှိခြင်းဟာ စိတ်ချမ်းသာခြင်းတစ်မျိုးပါပဲ။</p><p>&nbsp;</p><p>သူတစ်ပါးထက်သာမှ စိတ် ချမ်းသာတာမဟုတ်ဘူး၊သူများထက် လှမှ စိတ် ချမ်းသာရတာမဟုတ်ဘူး၊သူများထက်မြင့်မှ စိတ်ချမ်းသာရတာမဟုတ်ဘူး စိတ်ချမ်းသာအောင် နေတတ်တယ်ဆိုရင်ပဲ ဘာစည်းစိမ်ဘာအဆောင်အယောင်မှ မရှိလဲ နေရထိုင်ရတာကိုက စိတ် ချမ်းသာနေခြင်းပါ။</p><p>&nbsp;</p><p>စိတ် ချမ်းသာချင်ရင် တစ်ပါးသူဆီက ရမယ်ဆိုတဲ့မျှော်လင့်ချက်ကိုလျော့ပါ။သင် လုပ်နိူင်တာကိုလုပ်ပါ ဘယ်သူ့ဆီက ဘာမှ မမျှေယ်လင့်ရင် မကျေမနပ်ဖြစ်စရာ မလိုတော့ဘူးပေါ့။</p><p>&nbsp;</p><p>လေးစားစွာဖြင့်</p><p>မေဆု(ရာမညမြေ)28.5.2022</p><p>#MayHsuyarmanyamyae</p><p>#မေဆုရာမညမြေအတွေးစာစုလေးများ</p>', 'publish', 3),
(96, 32, 3, 'အခက်အခဲဆိုတာ လူတိုင်းမှာရှိကြတယ် လူတိုင်းမှာ မရှိတာက ကိုယ်ချင်းစာတရားပါ။', 'Htet Myat ', '2023-01-14 04:37:51', '1.jpg', '', '', '', 'အခက်အခဲဆိုတာ လူတိုင်းမှာရှိကြတယ် လူတိုင်းမှာ မရှိတာက ကိုယ်ချင်းစာတရားပါ။,Htet Myat ,2023/01/14', '<p>ကိုယ်တိုင် မခံစားဖူးသရွေ့တော့</p><p>လူတစ်ဖက်သားရဲ့ ခံစားချက်ကို နားလည်မှာမဟုတ်ဘူး။</p><p>&nbsp;</p><p>ကိုယ်ပြောခဲ့၊ကိုယ်ပြုခဲ့တဲ့အပြုအမူအတိုင်း ကိုယ်တိုင်မကြုံဖူးတဲ့အခါ အဲ့ဒီစကားလုံးတိုင်း အပြုအမူတိုင်းက တစ်ဖက်လူဘယ်လောက်ထိခံစားရမလဲဆိုတာ သ်ိမှာမဟုတ်ဘူး။</p><p>&nbsp;</p><p>နာကျင်ရတဲ့ ဒဏ်ကိုခံစားဖူးတော့ နည်းနည်းလေးထိခိုက်မိတာနဲ့ ကိုယ်ချင်းစာပေးတတ်တယ်။</p><p>&nbsp;</p><p>ဆုံးရှုးရတဲ့ ခံစားချက်ကို နားလည်တော့ ဘယ်အရာမဆိုတန်ဖိုးထားတတ်လာတယ်။</p><p>&nbsp;</p><p>စကားလုံးတိုင်းကို နှလုံးသားနဲ့ခံစားတတ်လာတော့ တစ်ဖက်သားကိုပြောတဲ့အခါတိုင်း အမှားမပါအောင် ဂရုစိုက်တတ်လာတယ်။</p><p>&nbsp;</p><p>ဒီလိုပဲ...ဘဝမှာ ဒါလေးပြောလိုက်တာကို&quot;ဒီလောက်ခံစားရလား?</p><p>ဒီလောက်လေးကို ဒီလိုနာကျင်ရလားဆိုတဲ့သူတွေကို အံ့သြမိတယ် ကိုယ်တိုင်အပြောမခံရ၊ကိုယ်တိုင်မကြုံရတော့ တစ်ဖက်လူရဲ့ခံစားချက်ကို ကိုယ်ချင်းမစာနာတတ်ကြတာပါ။</p><p>&nbsp;</p><p>ဒါကြောင့် တစ်ခုခုပြောမယ်ဆိုရင်သတိလေးထားပါ သူများကိုမှိချိုး၊မျှစ်ချိုးပြောခဲ့သလို ကိုယ်ကိုယ်တိုင်မှန်ထဲကြည့်ပြီး ခံစားနိူင်သလားလို ကိုယ့်ကိုကိုယ်ပြန်မေးကြည့်ပါ။</p><p>&nbsp;</p><p>ဘယ်အရာပဲ ဖြစ်ဖြစ်</p><p>အစွန်းရောက်တိုင်း မကောင်းသလို တယူသန်တိုင်းလည်းမကောင်းဘူး သူ့ဘက် ကိုယ့်ဘက်မျှကြည့်တတ်မှ လူပီသတဲ့စိတ်ရှိတာပါ။</p><p>&nbsp;</p><p>လေးစားစွာဖြင့်</p><p>#MayHsu(ရာမညမြေ)30.10.2022</p><p>#မေဆုရာမညမြေအတွေးစာစုလေးများ</p><p>#MayHsuyarmanyamyae</p><p>Credit</p><p>(#CrdHtet Myat Naing)</p>', 'publish', 1),
(97, 26, 1, '၂၀၂၁ - ၂၀၂၂ ပညာသင်နှစ်အတွက် တရုတ်အစိုးရပညာသင်ဆု လျှောက်ထား နိုင်ကြောင်း အသိပေးခြင်း', 'Admin', '2023-01-14 03:51:54', '', '', '', '', '၂၀၂၁ - ၂၀၂၂ ပညာသင်နှစ်အတွက် တရုတ်အစိုးရပညာသင်ဆု လျှောက်ထား နိုင်ကြောင်း အသိပေးခြင်း,Admin,2023/01/14', '<p>၂၀၂၁ - ၂၀၂၂ ပညာသင်နှစ်အတွက် တရုတ်အစိုးရပညာသင်ဆု လျှောက်ထား နိုင်ကြောင်း အသိပေးခြင်း<br />~~~~~~~~~~~<br />၂၀၂၁ - ၂၀၂၂ ပညာသင်နှစ်အတွက် တရုတ်အစိုးရအထောက်အပံ့ဖြင့် ပါရဂူဘွဲနှင့် မဟာဘွဲအစီအစဉ်များသို အောက်ပါသတ်မှတ်ချက်များနှင့် ကိုက်ညီသူများ လျှောက်ထား နိုင်ကြောင်းနှင့် ကျူရှင်၊ အာမခံနှင့် နေထိုင်မှုထောက်ပံ့ကြေးတိုအား တရုတ်အစိုးရမှ ထောက်ပံ့ မည် ဖြစ်ပါကြောင်း&nbsp;</p><p>- ဘွဲကြိုသင်တန်းသို လျှောက်ထားသူများသည် အသက်(၂၅)နှစ်အောက် ဖြစ်ရမည် ဖြစ်ပါကြောင်း၊</p><p>- မဟာဘွဲသင်တန်းသို လျှောက်ထားသူများသည် အသက်(၃၅)နှစ်အောက်ဖြစ်ပြီး တက္ကသိုလ် တစ်ခုခုမှ ဘွဲတစ်ခုရရှိထားသူများဖြစ်ရမည် ဖြစ်ပါကြောင်း၊</p><p>- ပါရဂူဘွဲလျှောက်ထားသူများသည် အသက်(၄၀)နှစ်အောက်ဖြစ်ပြီး မဟာဘွဲရရှိထားသူ များ ဖြစ်ရမည်ဖြစ်ပါကြောင်း ၊</p><p>- General Scholar Programs သို လျှောက်ထားသူများသည် အသက် (၄၅)နှစ် အောက်နှင့် ဘွဲကြိုသင်တန်းတွင် အနည်းဆုံး(၂)နှစ် လေ့လာပြီးသူများဖြစ်ရမည်ဖြစ်ပါကြောင်း၊</p><p>- Senior Scholar Programs လျှောက်ထားသူများအနေဖြင့် အသက် (၅၀)နှစ်အောက်ရှိပြီး မဟာဘွဲရရှိထားသူ (သိုမဟုတ်) တွဲဖက်ပါမောက္ခနှင့်အထက် ဆရာ၊ဆရာမများဖြစ်ရ မည် ဖြစ်ပါကြောင်း၊</p><p>- လျှောက်ထားလိုသူများအနေဖြင့် အသေးစိတ်အချက်အလက်များသိရှိလိုပါက သက်ဆိုင် ရာ Website: www.campuschina.org သိုဝင်ရောက်ကြည့်ရှု၍ (၁-၃-၂၀၂၁)ရက်နေ့ နောက်ဆုံးထား၍ တိုက်ရိုက်ပေးပို လျှောက်ထားနိုင်ပါကြောင်း အသိပေးအပ်ပါသည်။</p>', 'publish', 1),
(98, 25, 1, 'Internship', 'Admin', '2023-01-14 03:54:22', 'photo_2023-01-14_03-52-40.jpg', '', '', '', 'Internship,Admin,2023/01/14', '<p>Galaxie AI Company Limited တွင် Internship Program 2021 ပြုလုပ်လိုသော စတုတ္ထနှစ် ကျောင်းသား၊ကျောင်းသူများ၊ OJT လျှောက်ထားလိုသော ပဥ္စမနှစ် ကျောင်းသား၊ကျောင်းသူများနှင့် ဘွဲရရှိပြီးသူများသည် Galaxie AI Company Limited တွင် လျှောက်ထားလိုပါက မိမိတို၏ CV Form အား email address hr@galaxie.ai သို ပေးပိုလျှောက်ထားနိုင်ပါသည်။</p>', 'publish', 1),
(101, 27, 1, 'UCS (Mgy) Learning Management System', 'Admin', '2023-01-14 03:59:56', 'photo_2023-01-14_03-59-43.jpg', '', '', '', 'UCS (Mgy) Learning Management System,Admin,2023/01/14', '<p>ကွန်ပျူတာတက္ကသိုလ်(မကွေး) ကျောင်းသား/ကျောင်းသူများ Learning Management System (LMS) မှ သင်ခန်းစာများလေ့လာသင်ယူနိုင်ရေးအတွက် &nbsp; username နှင့် password တိုကို ကျောင်းသားတစ်ဦးချင်းစီ ၏ edu mail သို ပေးပိုထားပြီးဖြစ်ပါသည်။ မိမိတိုနှင့်သက်ဆိုင်သည့် အတန်းအလိုက် ဘာသာရပ်များကို http://lms.ucsmgy.edu.mm/ တွင်ဝင်ရောက်လေ့လာနိုင်ပါသည်။</p><p>lms.ucsmgy.edu.mm (http://lms.ucsmgy.edu.mm/)<br />UCS (Mgy) Learning Management System<br />Welcome to the Learning Management System of UCS (Magway).</p>', 'publish', 0),
(104, 33, 1, 'Online ICT Project Competition in New Normal Life, 2020 ပြိုင်ပွဲ ကျင်းပပြုလုပ်', 'Admin', '2023-01-28 20:23:37', 'photo_2023-01-14_04-01-21.jpg', '', '', '', 'Online ICT Project Competition in New Normal Life, 2020 ပြိုင်ပွဲ ကျင်းပပြုလုပ်,Admin,2023/01/28', '<p>Online ICT Project Competition in New Normal Life, 2020 ပြိုင်ပွဲ ကျင်းပပြုလုပ်</p><p>ကွန်ပျူတာတက္ကသိုလ်(မကွေး) ၂၀၁၉-၂၀၂၀ ပညာသင်နှစ်၏ &ldquo;Online ICT Project Competition in New Normal Life, 2020&rdquo; ပြိုင်ပွဲကို (၇.၉.၂၀၂၀)ရက်နေ့ နံနက်(၉:၃၀)နာရီမှစတင်၍ Microsoft Team ဖြင့် Online &nbsp;ပြိုင်ပွဲ ကျင်းပပြုလုပ်ခဲ့ရာ ကွန်ပျူတာသိပ္ပံဘာသာရပ်မှ ပြိုင်ပွဲဝင် Project(၁၁)ခုနှင့် ကွန်ပျူတာနည်းပညာဘာသာရပ်မှ ပြိုင်ပွဲဝင် Project (၃)ခုတို ပါဝင်ယှဉ်ပြိုင်ခဲ့ကြပါသည်။ ပြိုင်ပွဲဝင်အသင်းများမှ ဆုရရှိသော အသင်းများအား ပထမဆု(၃၀၀၀၀၀/-)ကျပ်၊ ဒုတိယဆု(၂၀၀၀၀၀/-)ကျပ် နှင့် တတိယဆု(၁၀၀၀၀၀/-)ကျပ် စသည်ဖြင့်ဆုများအသီးသီးချီးမြှင့်ခဲ့ပါသည်။</p><p>ဆုရရှိသောအသင်းများ-</p><p>ကွန်ပျူတာသိပ္ပံဘာသာရပ်</p><p>#ပထမဆု- Gen Z အသင်း (Webpage Framework Generator)<br />#ဒုတိယဆု- Collectives အသင်း (Learn Dtools)<br />#တတိယဆု- Reality of Unreal အသင်း (Our Uni (Version 2.0)</p><p>ကွန်ပျူတာနည်းပညာဘာသာရပ်</p><p>#ပထမဆု- Creative teenagers အသင်း (Smart City)<br />#ဒုတိယဆု- 3 ERROR အသင်း (Fire Fighting Robot)</p>', 'publish', 4),
(118, 5, 9, 'Prediction Analysis of Coronary Artery Disease using Naïve Bayes and Random Forest Classification', 'Nandar Lin', '2023-01-25 21:00:25', 'heart.png', '', 'Final Year DM Project(Heart Disease) (2).zip', '', 'Prediction Analysis of Coronary Artery Disease using Naïve Bayes and Random Forest Classification,Nandar Lin,2023/01/25', '<p>Health care is an inevitable task to be done in human life. Many people have been died over the world due to Coronary artery disease. Coronary artery disease&nbsp;is a narrowing or blockage of your coronary arteries usually caused by the buildup of fatty material called plaque. Coronary artery disease can lead to angina and heart attack.If the arteries supplying the heart become narrow, blood flow can slow down or stop. This can cause chest pain (stable angina), shortness of breath, and other symptoms. Narrowed or blocked arteries may also cause problems in the intestines, kidneys, legs, and brain.Our system help to predict whether patients have Coronary Artery Disease or not using Orange Data MiningTool.Prediction analysis of Coronary Artery Disease can assist medical experts for predicting&nbsp; disease current status based on the clinical data of various patients.In this project, the Coronary Artery Disease prediction using Na&iuml;ve Bayes, and Random Forest classification algorithms is discussed.Na&iuml;ve Bayes, Random Forest algorithms are ones such data mining method which serves with the diagnosis regarding coronary artery disease patient.</p><p>If you want to know more this project ,you may download this zip file.</p>', 'publish', 2),
(120, 1, 9, 'Android', 'Nandar Lin', '2023-01-30 23:43:52', 'road.png', '', '', '', 'Android,Nandar Lin,2023/01/30', '<p>Safe Road Mobile App is the mobile communication platform enable the&nbsp; road users to directly report major potholes and damaged road to authorities for maintenance.The information, which will be reported through the App by uploading photos&nbsp; will feed directly&nbsp; to all&nbsp; Provincial Departments of Public Works and Transport and other relevant authorities for repair.This Mobile App will contribute to the country&rsquo;s growth and development, enable road users to drive and ride on the country&rsquo;s road networks safely.</p>', 'publish', 1),
(122, 33, 4, 'Online ICT Project Competition in New Normal Life, 2020 ပြိုင်ပွဲ ကျင်းပပြုလုပ်', 'Han Ni Khaing Oo', '2023-01-28 20:46:13', 'photo_2023-01-14_04-01-21.jpg', '', '', '', 'Online ICT Project Competition in New Normal Life, 2020 ပြိုင်ပွဲ ကျင်းပပြုလုပ်,Admin,2023/01/28', '<p>Online ICT Project Competition in New Normal Life, 2020 ပြိုင်ပွဲ ကျင်းပပြုလုပ်</p><p>ကွန်ပျူတာတက္ကသိုလ်(မကွေး) ၂၀၁၉-၂၀၂၀ ပညာသင်နှစ်၏ &ldquo;Online ICT Project Competition in New Normal Life, 2020&rdquo; ပြိုင်ပွဲကို (၇.၉.၂၀၂၀)ရက်နေ့ နံနက်(၉:၃၀)နာရီမှစတင်၍ Microsoft Team ဖြင့် Online &nbsp;ပြိုင်ပွဲ ကျင်းပပြုလုပ်ခဲ့ရာ ကွန်ပျူတာသိပ္ပံဘာသာရပ်မှ ပြိုင်ပွဲဝင် Project(၁၁)ခုနှင့် ကွန်ပျူတာနည်းပညာဘာသာရပ်မှ ပြိုင်ပွဲဝင် Project (၃)ခုတို ပါဝင်ယှဉ်ပြိုင်ခဲ့ကြပါသည်။ ပြိုင်ပွဲဝင်အသင်းများမှ ဆုရရှိသော အသင်းများအား ပထမဆု(၃၀၀၀၀၀/-)ကျပ်၊ ဒုတိယဆု(၂၀၀၀၀၀/-)ကျပ် နှင့် တတိယဆု(၁၀၀၀၀၀/-)ကျပ် စသည်ဖြင့်ဆုများအသီးသီးချီးမြှင့်ခဲ့ပါသည်။</p><p>ဆုရရှိသောအသင်းများ-</p><p>ကွန်ပျူတာသိပ္ပံဘာသာရပ်</p><p>#ပထမဆု- Gen Z အသင်း (Webpage Framework Generator)<br />#ဒုတိယဆု- Collectives အသင်း (Learn Dtools)<br />#တတိယဆု- Reality of Unreal အသင်း (Our Uni (Version 2.0)</p><p>ကွန်ပျူတာနည်းပညာဘာသာရပ်</p><p>#ပထမဆု- Creative teenagers အသင်း (Smart City)<br />#ဒုတိယဆု- 3 ERROR အသင်း (Fire Fighting Robot)</p>(#CrdAdmin)', 'publish', 0),
(123, 3, 4, 'Fertilizer Selling System', 'Han Ni Khaing Oo', '2023-01-28 22:52:21', 'project.JPG', '', '', '', 'Fertilizer Selling System,Han Ni Khaing Oo,2023/01/28', '<p>The name of the project that we make is &ldquo;Fertilizer Selling System&rdquo;.Farmers need to use fertilizers when they plant many crops.So they need to know types, price and packing of fertilizer.Our project system can help above of these facts.Our project has seven forms.Two types separate admin form and user form.</p>', 'publish', 0),
(136, 6, 9, 'Implementation of Divorce Prediction Analysis using Python Code', 'Nandar Lin', '2023-02-09 21:15:24', 'Python-Data-Mining.jpg', '', 'Python_Vscode.zip', '', 'Implementation of Divorce Prediction Analysis using Python Code,Nandar Lin,2023/02/09', '<p>This dataset contains the 54 survey questions and answers asked to the married couple. They were answered by 170 people. In this dataset, there are 84 divorced and 86 married. Each question had different probabilities of impact. Answers are on a 5-point scale (0 = Never, 1 = Rarely, 2 = Average, 3 = Often, 4 = Always). We can use this dataset to predict whether a married couple will divorce.<br />&nbsp;</p><p><strong>Data set Link</strong><strong> </strong>Kaggle: - <a target=\"_blank\" href=\"https://www.kaggle.com/adisak/divorce-predictors-data-set-csv\">https://www.kaggle.com/adisak/divorce-predictors-data-set-csv</a></p><p>You want to know detail &ndash; download below file.</p>', 'publish', 1),
(137, 4, 9, 'Brute Force Attack', 'Nandar Lin', '2023-02-09 21:18:20', 'brute2.png', '', 'Final Year IS Project(Brute Force Attack) Post.zip', '', 'Brute Force Attack,Nandar Lin,2023/02/09', '<p>Our Project is brute force attacking on three levels of DVWA(Damn Vulnerable Web Application).In the first , we attack Login page of DVWA without any protection methods. We also need to provide password list and URL to attack. In the second , we attack medium security of login page &ldquo; DVWA&rdquo; which extends the security from the low level by adding a time delay on failed logins.In the last , we describe how to prevent the brute force attack . In our project, we demonstrate high security of login page &ldquo; DVWA&rdquo; which have CSRF Token.</p>', 'publish', 1),
(138, 5, 9, 'Orange Datamining Tool ', 'Nandar Lin', '2023-02-09 21:25:42', 'orange_title_scaled.png', '', '', '', 'Orange Datamining Tool ,Nandar Lin,2023/02/09', '<p>Orange&nbsp;is an open-source data visualization, machine learning and data mining toolkit. Its core is written in C++ with Python wrappers and is developed by the University of Ljubljana (Slovenia). The default installation includes a number of machine learning, preprocessing and data visualization algorithms in five widget sets (data, visualize, model, evaluate and unsupervised). Additional functionalities are available as add-ons (bioinformatics, data fusion and text-mining). You can get Orange Software from the link -https://orangedatamining.com/</p>', 'publish', 0),
(143, 3, 4, 'Fertilizer Selling System', 'Han Ni Khaing Oo', '2023-02-10 14:11:34', 'project.jfif', '', '', '', 'Fertilizer Selling System,Han Ni Khaing Oo,2023/02/10', '<p>The name of the project that we make is &ldquo;Fertilizer Selling System&rdquo;.Farmers need to use fertilizers when they plant many crops.So they need to know types, price and packing of fertilizer.Our project system can help above of these facts.Our project has seven forms.Two types separate admin form and user form.</p>', 'publish', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `post_id`, `user_id`, `comment`, `timestamp`) VALUES
(103, 89, 4, 'မှန်လိုက်တာ', '2023-01-25 12:20:28'),
(104, 118, 4, 'good', '2023-01-28 20:36:26'),
(111, 119, 4, 'good', '2023-01-31 10:25:36'),
(112, 89, 25, 'good', '2023-01-31 13:44:53'),
(113, 89, 25, 'you are shit', '2023-01-31 13:45:04'),
(114, 89, 25, 'good', '2023-01-31 13:45:17'),
(115, 104, 16, 'good', '2023-02-09 20:40:21'),
(116, 104, 16, 'you are shit', '2023-02-09 20:42:02'),
(117, 104, 16, 'good', '2023-02-09 20:43:01'),
(118, 104, 30, 'good', '2023-02-10 14:04:17'),
(119, 104, 30, 'good', '2023-02-10 14:04:51'),
(120, 104, 30, 'you are shit', '2023-02-10 14:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follow`
--

CREATE TABLE `tbl_follow` (
  `follow_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_follow`
--

INSERT INTO `tbl_follow` (`follow_id`, `sender_id`, `receiver_id`) VALUES
(34, 3, 4),
(35, 9, 4),
(36, 16, 4),
(37, 4, 3),
(39, 3, 9),
(40, 9, 9),
(41, 4, 25),
(42, 9, 25),
(43, 9, 16),
(44, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE `tbl_like` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_like`
--

INSERT INTO `tbl_like` (`like_id`, `user_id`, `post_id`) VALUES
(66, 4, 118),
(67, 4, 104),
(68, 4, 81),
(69, 9, 104),
(71, 3, 98),
(72, 3, 26),
(73, 3, 118),
(76, 4, 119),
(77, 4, 120),
(79, 25, 89),
(80, 16, 104),
(81, 4, 137),
(82, 4, 136),
(83, 30, 104);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(11) NOT NULL,
  `notification_receiver_id` int(11) NOT NULL,
  `notification_text` text NOT NULL,
  `read_notification` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `notification_receiver_id`, `notification_text`, `read_notification`) VALUES
(193, 3, '<b>Han Ni Khaing Oo</b> has follow you.', 'no'),
(194, 9, '<b>Han Ni Khaing Oo</b> has follow you.', 'yes'),
(195, 16, '<b>Han Ni Khaing Oo</b> has follow you.', 'yes'),
(197, 9, '<b>Han Ni Khaing Oo</b> has comment on your post - \"Health care ...\"', 'yes'),
(198, 9, '\r\n				<b>Han Ni Khaing Oo</b> has like your post - \"Health care is an inevitabl...\"\r\n				', 'yes'),
(199, 9, '<b>Han Ni Khaing Oo</b> has comment on your post - \"Health care ...\"', 'yes'),
(200, 9, '<b>Han Ni Khaing Oo</b> has comment on your post - \"Health care ...\"', 'yes'),
(201, 9, '<b>Han Ni Khaing Oo</b> has comment on your post - \"Health care ...\"', 'yes'),
(202, 1, '\r\n				<b>Han Ni Khaing Oo</b> has like your post - \"Online ICT Project Competit...\"\r\n				', 'yes'),
(203, 1, '<b>Han Ni Khaing Oo</b> has repost your post - \"Online ICT Project Com...\"', 'yes'),
(204, 3, '\r\n				<b>Han Ni Khaing Oo</b> has like your post - \"...\"\r\n				', 'no'),
(205, 1, '\r\n				<b>Nandar Lin</b> has like your post - \"Online ICT Project Competit...\"\r\n				', 'yes'),
(207, 1, '\r\n				<b>Htet Myat </b> has like your post - \"Galaxie AI Company Limited ...\"\r\n				', 'yes'),
(208, 1, '\r\n				<b>Htet Myat </b> has like your post - \"ကွန်ပျူတာ...\"\r\n				', 'yes'),
(209, 9, '\r\n				<b>Htet Myat </b> has like your post - \"Health care is an inevitabl...\"\r\n				', 'yes'),
(210, 4, '<b>Htet Myat Naing</b> has follow you.', 'yes'),
(211, 3, '\r\n				<b>htet</b> has like your post - \"ကိုယ်တိုင...\"\r\n				', 'no'),
(212, 3, '\r\n				<b>htet</b> has like your post - \"ကိုယ်တိုင...\"\r\n				', 'no'),
(213, 3, '<b>htet</b> has comment on your post - \"ကိုယ...\"', 'no'),
(214, 3, '<b>htet</b> has comment on your post - \"ကိုယ...\"', 'no'),
(215, 3, '<b>htet</b> has comment on your post - \"ကိုယ...\"', 'no'),
(216, 9, '<b>Han Ni Khaing Oo</b> has repost your post - \"Health care is an inev...\"', 'yes'),
(217, 9, '<b>Han Ni Khaing Oo</b> has repost your post - \"This dataset contains ...\"', 'yes'),
(218, 9, '\r\n				<b>Han Ni Khaing Oo</b> has like your post - \"This dataset contains the 5...\"\r\n				', 'yes'),
(219, 9, '<b>Han Ni Khaing Oo</b> has comment on your post - \"This dataset...\"', 'yes'),
(220, 9, '\r\n				<b>Han Ni Khaing Oo</b> has like your post - \"Safe Road Mobile App is the...\"\r\n				', 'yes'),
(221, 9, '<b>Han Ni Khaing Oo</b> has repost your post - \"Safe Road Mobile App i...\"', 'yes'),
(222, 3, '<b>su su</b> has follow you.', 'no'),
(223, 3, '\r\n				<b>su su</b> has like your post - \"သူတစ်ပါး ??...\"\r\n				', 'no'),
(224, 3, '\r\n				<b>su su</b> has like your post - \"သူတစ်ပါး ??...\"\r\n				', 'no'),
(225, 3, '<b>su su</b> has comment on your post - \"သူတစ...\"', 'no'),
(226, 3, '<b>su su</b> has comment on your post - \"သူတစ...\"', 'no'),
(227, 3, '<b>su su</b> has comment on your post - \"သူတစ...\"', 'no'),
(228, 3, '<b>su su</b> has repost your post - \"သူတစ်ပါ?...\"', 'no'),
(229, 3, '<b>Nandar Lin</b> has follow you.', 'no'),
(230, 9, '<b>Nandar Lin</b> has follow you.', 'no'),
(231, 4, '<b>su </b> has follow you.', 'no'),
(232, 9, '<b>su </b> has follow you.', 'no'),
(233, 1, '\r\n				<b>Hnin Thi Dar Oo</b> has like your post - \"Online ICT Project Competit...\"\r\n				', 'yes'),
(234, 1, '<b>Hnin Thi Dar Oo</b> has comment on your post - \"Online ICT P...\"', 'yes'),
(235, 1, '<b>Hnin Thi Dar Oo</b> has comment on your post - \"Online ICT P...\"', 'yes'),
(236, 1, '<b>Hnin Thi Dar Oo</b> has comment on your post - \"Online ICT P...\"', 'yes'),
(237, 9, '<b>Hnin Thi Dar Oo</b> has follow you.', 'no'),
(238, 9, '<b>Han Ni Khaing Oo</b> has repost your post - \"Our Project is brute f...\"', 'no'),
(239, 9, '\r\n				<b>Han Ni Khaing Oo</b> has like your post - \"Our Project is brute force ...\"\r\n				', 'no'),
(240, 9, '<b>Han Ni Khaing Oo</b> has repost your post - \"This dataset contains ...\"', 'no'),
(241, 9, '\r\n				<b>Han Ni Khaing Oo</b> has like your post - \"This dataset contains the 5...\"\r\n				', 'no'),
(242, 9, '<b>Han Ni Khaing Oo</b> has repost your post - \"Orange&nbsp;is an open...\"', 'no'),
(243, 1, '\r\n				<b>han ni</b> has like your post - \"Online ICT Project Competit...\"\r\n				', 'yes'),
(244, 1, '<b>han ni</b> has comment on your post - \"Online ICT P...\"', 'yes'),
(245, 1, '<b>han ni</b> has comment on your post - \"Online ICT P...\"', 'yes'),
(246, 1, '<b>han ni</b> has comment on your post - \"Online ICT P...\"', 'yes'),
(247, 4, '<b>Han Ni Khaing Oo</b> has follow you.', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repost`
--

CREATE TABLE `tbl_repost` (
  `report_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_repost`
--

INSERT INTO `tbl_repost` (`report_id`, `post_id`, `user_id`) VALUES
(19, 104, 4),
(20, 118, 4),
(21, 119, 4),
(22, 120, 4),
(23, 89, 25),
(24, 137, 4),
(25, 136, 4),
(26, 138, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_role` varchar(30) NOT NULL DEFAULT 'Writer',
  `date` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `follower_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `username`, `email`, `email_verified`, `password`, `user_role`, `date`, `image`, `status`, `follower_number`) VALUES
(1, 1011255920, 'Admin', 'hninthidaroo16@ucsmgy.edu.mm', 'hninthidaroo16@ucsmgy.edu.mm', 'daa0ed9ab1219e279e746219496547c4e457c0f6e2c4d1d968f09243b618353b', 'Admin', '2022-12-26 17:03:42', 'crown1.png', 'Active now', 0),
(3, 680001175, 'Htet Myat Naing', 'htetmyatnaing16@ucsmgy.edu.mm', 'htetmyatnaing16@ucsmgy.edu.mm', 'daa0ed9ab1219e279e746219496547c4e457c0f6e2c4d1d968f09243b618353b', 'Writer', '2022-12-27 04:39:15', 'a.jpg', 'Offline now', 3),
(4, 658193727, 'Han Ni Khaing Oo', 'hannikhaingoo16@ucsmgy.edu.mm', 'hannikhaingoo16@ucsmgy.edu.mm', 'daa0ed9ab1219e279e746219496547c4e457c0f6e2c4d1d968f09243b618353b', 'Writer', '2022-12-27 04:40:49', '1672112449han_uniform.jpg', 'Offline now', 3),
(9, 1568873885, 'Nandar Lin', 'nandarlin16@ucsmgy.edu.mm', 'nandarlin16@ucsmgy.edu.mm', 'daa0ed9ab1219e279e746219496547c4e457c0f6e2c4d1d968f09243b618353b', 'Writer', '2023-01-09 15:08:49', 'nandar_uniform.png', 'Offline now', 5),
(11, 1161647361, 'Yoon Myat Noe', 'yoonmyatnoe16@ucsmgy.edu.mm', 'yoonmyatnoe16@ucsmgy.edu.mm', 'f5f1ca2839602b53864c78f60e4e319e09eab7c89681da6b121e3371c9d5611d', 'Writer', '2023-01-10 14:55:40', 'yoonmyatnoe.jpg', 'Offline now', 1),
(12, 1173541902, 'Thu Zin Aung', 'thuzinaung16@ucsmgy.edu.mm', 'thuzinaung16@ucsmgy.edu.mm', 'f5f1ca2839602b53864c78f60e4e319e09eab7c89681da6b121e3371c9d5611d', 'Writer', '2023-01-10 14:59:39', 'thuzinaung.jpg', 'Offline now', 1),
(13, 400541124, 'Aung Myo Myint', 'aungmyomyint16@ucsmgy.edu.mm', 'aungmyomyint16@ucsmgy.edu.mm', 'f5f1ca2839602b53864c78f60e4e319e09eab7c89681da6b121e3371c9d5611d', 'Public User', '2023-01-10 15:04:51', 'op.jpg', 'Offline now', 1),
(16, 336117692, 'Hnin Thi Dar Oo', 'hninthidaroo295960@gmail.com', 'hninthidaroo295960@gmail.com', 'f5f1ca2839602b53864c78f60e4e319e09eab7c89681da6b121e3371c9d5611d', 'Public User', '2023-01-19 06:47:30', 'snow.jpg', 'Offline now', 1),
(18, 1391518624, 'Aye Mon Myint', 'ayemonmyint16@ucsmgy.edu.mm', 'ayemonmyint16@ucsmgy.edu.mm', 'f5f1ca2839602b53864c78f60e4e319e09eab7c89681da6b121e3371c9d5611d', 'Public User', '2023-01-28 15:53:02', '1674917582FB_IMG_1674917233294.jpg', 'Offline now', 0),
(19, 861561104, 'Nay Chi Nway Nway', 'naychinwaynway16@ucsmgy.edu.mm', 'naychinwaynway16@ucsmgy.edu.mm', 'f5f1ca2839602b53864c78f60e4e319e09eab7c89681da6b121e3371c9d5611d', 'Writer', '2023-01-28 15:58:24', '1674917904FB_IMG_1674917183977.jpg', 'Offline now', 0),
(26, 833446500, 'snows', 'swekin357@gmail.com', 'swekin357@gmail.com', 'c99a4d57075df9c9786fb66e1d290ad193442e8c4b1b59fe88257fbe56c87fc0', 'Publish User', '2023-01-31 14:01:56', '', 'Offline now', 0),
(28, 1117633960, 'htet', 'htetmyatnaing1512@gmail.com', 'htetmyatnaing1512@gmail.com', 'f5f1ca2839602b53864c78f60e4e319e09eab7c89681da6b121e3371c9d5611d', 'Public User', '2023-02-09 16:16:45', '16759558051671462804pop.jpg', 'Offline now', 0),
(30, 620838129, 'han ni', 'hannikhaingoo261@gmail.com', 'hannikhaingoo261@gmail.com', 'f5f1ca2839602b53864c78f60e4e319e09eab7c89681da6b121e3371c9d5611d', 'Public User', '2023-02-10 08:26:15', '1676013975han.jpg', 'Offline now', 0);

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `expires` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `code`, `expires`, `email`) VALUES
(1, 95599, 1674189040, 'hninthidaroo16@ucsmgy.edu.mm'),
(4, 89856, 1674637602, 'htetmyatnaing16@ucsmgy.edu.mm'),
(5, 29464, 1674915901, 'hannikhaingoo16@ucsmgy.edu.mm'),
(10, 77293, 1672304986, 'swekhin357@gmail.com'),
(11, 25757, 1674626943, 'nandarlin16@ucsmgy.edu.mm'),
(12, 26341, 1673359092, 'yoonmyatnoe16@ucsmgy.edu.mm'),
(13, 51428, 1673359327, 'thuzinaung16@ucsmgy.edu.mm'),
(14, 89000, 1673359640, 'aungmyomyint16@ucsmgy.edu.mm'),
(40, 51588, 1674107621, 'hninthidaroo295960@gmail.com'),
(41, 89158, 1674918066, 'ayemonmyint16@ucsmgy.edu.mm'),
(42, 10363, 1674918220, 'naychinwaynway16@ucsmgy.edu.mm'),
(48, 12790, 1675956186, 'htetmyatnaing1512@gmail.com'),
(49, 47658, 1675149434, 'htetmyatnaing1512@gmail.com'),
(50, 57434, 1675955906, 'htetmyatnaing1512@gmail.com'),
(51, 47733, 1675955918, 'htetmyatnaing1512@gmail.com'),
(52, 44812, 1675955965, 'htetmyatnaing1512@gmail.com'),
(53, 70563, 1675956130, 'htetmyatnaing1512@gmail.com'),
(55, 11719, 1676014302, 'hannikhaingoo261@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_group`
--
ALTER TABLE `blog_group`
  ADD PRIMARY KEY (`Blog_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `Blog_id` (`blog_postid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `cat_id` (`post_category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_repost`
--
ALTER TABLE `tbl_repost`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_group`
--
ALTER TABLE `blog_group`
  MODIFY `Blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `tbl_repost`
--
ALTER TABLE `tbl_repost`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `Test` FOREIGN KEY (`blog_postid`) REFERENCES `blog_group` (`Blog_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
