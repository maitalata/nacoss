-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `associations`;
CREATE TABLE `associations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `association` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `associations` (`id`, `user`, `rank`, `association`) VALUES
(1,	'maitalata',	'Member',	'Young Programmers Forum'),
(3,	'maitalata',	'Member',	'Computer Society of Nigeria');

DROP TABLE IF EXISTS `institutions`;
CREATE TABLE `institutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `institutionName` varchar(200) NOT NULL,
  `fromD` varchar(30) NOT NULL,
  `toD` varchar(30) NOT NULL,
  `certificate` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `institutions` (`id`, `user`, `institutionName`, `fromD`, `toD`, `certificate`) VALUES
(1,	'samira',	'Musa Iliasu College',	'2002',	'2008',	'Primary School Leaving Certificate'),
(2,	'samira',	'Government Girls Secondary School Dala',	'2008',	'2014',	'Senior Secondary School Certificate'),
(4,	'samira',	'Kano State Polytechnic',	'2014',	'2016',	'National Diploma in Pharmacy Technician'),
(5,	'maitalata',	'Bako Memorial Nursery and Primary School',	'1998',	'2004',	'Primary School Leaving Certificate'),
(6,	'maitalata',	'Alhassan Usman College Kano',	'2004',	'2010',	'SSCE'),
(7,	'maitalata',	'Kano State Polytechnic',	'2011',	'2013',	'National Diploma in Computer Science (Upper Credit)'),
(8,	'maitalata',	'Yusuf Maitama Sule University, Kano',	'2017',	'2019',	'B.Sc. Computer Science'),
(10,	'maryam12',	'Aminu Kano Commercial College',	'2013',	'1958',	'SSCE'),
(11,	'amuket',	'Musa Iliasu College',	'1950',	'1965',	'National Diploma in Pharmacy Technician');

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `messages` (`id`, `name`, `email`, `message`) VALUES
(1,	'Aminu Ajingi',	'ajingi@gmail.com',	'Hello There'),
(2,	'Umar Sunusi Maitalata',	'maitalata@gmail.com',	'csbhcvyvd');

DROP TABLE IF EXISTS `publications`;
CREATE TABLE `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL,
  `publication` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `publications` (`id`, `user`, `publication`) VALUES
(1,	'samira',	'Effect of Sleeping Drug - Paper presented at the 2017 General Pharmacy Technicians Seminars at Kano State Polytechnic School of Technology'),
(2,	'samira',	'Opinion on Drug Abuse in Daily Trust of Monday 17th September, 2018'),
(3,	'maitalata',	'Application of VSAT in Remote Rural Area - 2013 School Seminar'),
(5,	'maitalata',	'Effect of Computers In Society');

DROP VIEW IF EXISTS `qt`;
CREATE TABLE `qt` (`id` int(11), `quote` text, `author` varchar(50));


DROP TABLE IF EXISTS `quotes`;
CREATE TABLE `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `day` char(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `quotes` (`id`, `quote`, `author`, `day`) VALUES
(1,	'Do it trembling if you must, but do it!',	'Emmet Fox',	'9/20'),
(2,	'Consider the postage stamp. It secures success through its ability to stick to one thing until it gets there.',	'Josh Billings',	'9/21'),
(3,	'It takes twenty years to become an overnight success.',	'Eddie Cantor',	'9/22'),
(4,	'The basic rule of free enterprise: You must give in order to get.',	'Scott Alexander',	'9/23'),
(5,	'The more tranquil a man becomes, the greater is his success, his influence, his power for good. Calmness of mind is one of the beautiful jewels of wisdom.',	'James Allen',	'9/24'),
(6,	'The thing always happens that you really believe in and the belief in a thing makes it happen.',	'Frank Lyold Wright',	'9/25'),
(7,	'The road to success is always under construction.',	'Lily Tomlin',	'9/26'),
(8,	'Hope is not a dream, but a way of making dreams become reality.',	'L.J. Cardina Suesens',	'9/27'),
(9,	'They can because they think they can.',	'Virgil',	'9/28'),
(10,	'We are made to persist. That\'s how we find out who we are.',	'Tobias Wolff',	'9/29'),
(11,	'Success has nothing to do with what you gain in life or accomplish for yourself. It\'s what you do for others.',	'Danny Thomas',	'9/30'),
(12,	'Men are born to succeed, not to fail.',	'Henry David Thoreau',	'10/1'),
(13,	'It\'s no use saying, \'We are doing our best.\' You have got to succeed in doing what is necessary.',	'Winston Churchill',	'10/2'),
(14,	'Success is a process, a quality of mind and way of being, an outgoing affirmation of life.',	'Alex Noble',	'10/3'),
(15,	'Only those who will risk going too far can possibly find out how far they can go.',	'T.S. Eliot',	'10/4'),
(16,	'A man can succeed at almost anything for which he has unlimited enthusiasm.',	' Charles Schwab',	'10/5'),
(17,	'The five essential entrepreneurial skills for success: Concentration,Discrimination, Organization, Innovation and Communication.',	'Michael Gerber',	'10/6'),
(18,	'One sound idea is all that you need to achieve success.',	'Napoleon Hill',	'10/7'),
(19,	'We can do anything we want to do if we stick to it long enough.',	'Helen Keller',	'10/8'),
(20,	'Success seems to be largely a matter of hanging on after others have let go.',	'William Feather',	'10/9'),
(21,	'Hard work is the price we must pay for success. I think you can accomplish anything if you\'re willing to pay the price.',	'Vince Lombardi',	'10/10'),
(22,	'Failure is only the opportunity to begin again more intelligently.',	'Henry Ford',	'10/11'),
(23,	'If you have no critics you\'ll likely have no success.',	'Malcolm Forbes',	'10/12'),
(24,	'In the middle of difficulty, lies opportunity.',	'Albert Einstein',	'10/13'),
(25,	'If you want to be successful, it\'s just this simple: Know what you are doing, love what you are doing, and believe in what you are doing.',	'Will Rogers',	'10/14'),
(26,	'Human beings can alter their lives by altering their attitudes of mind.',	'William James',	'10/15'),
(27,	'Give me a stock clerk with a goal and I\'ll give you a man who will make history. Give me a man with no goals and I\'ll give you a stock clerk.',	'J.C. Penney',	'10/16'),
(28,	'The successful man is one who had the chance and took it.',	'Roger Babson',	'10/17'),
(29,	'Make the most of yourself, for that is all there is for you.',	'Ralph Waldo Emerson',	'10/18'),
(30,	'If you are never scared, embarrassed or hurt, it means you never take chances.',	'Julia Soul',	'10/19'),
(31,	'Man is a goal-seeking animal. His life only has meaning if he is reaching out and striving for his goals.',	'Aristotle',	'10/20'),
(32,	'The first step towards success in any occupation is to become interested in it.',	'Sir William Osler',	'10/21'),
(33,	'Every man is free to rise as far as he\'s able or willing, but the degree to which he thinks determines the degree to which he\'ll rise.',	'Ayn Rand',	'10/22'),
(34,	'The successful person places more attention on doing the right thing rather than doing things right.',	'Peter Drucker',	'10/23'),
(35,	'I have failed over and over again - that is why I succeed.',	'Michael Jordan',	'10/24'),
(36,	'The great end of life is not knowledge but action.',	'Thomas Henry Huxley',	'10/25'),
(37,	'The men who have done big things are those who were not afraid to attempt big things, who were not afraid to risk failure in order to gain success.',	'B.C. Forbes',	'10/26'),
(38,	'Do not let what you cannot do interfere with what you can do.',	'John Wooden',	'10/27'),
(39,	'Success is living up to your potential. That\'s all. Wake up with a smile and go after life ... live it, enjoy it, taste it, smell it, feel it.',	'Joe Knapp',	'10/28'),
(40,	'Only those who dare to fail greatly can ever achieve greatly.',	'Robert F. Kennedy',	'10/29'),
(41,	'A leader has the vision and conviction that a dream can be achieved. He inspired the power and energy to get it done.',	'Ralph Lauren',	'10/30'),
(42,	'What the mind can conceive and believe, the mind can achieve.',	'Napoleon Hill',	'10/31'),
(43,	'The way to succeed is to double your failure rate. Failure is the opportunity to begin again more intelligently.',	'Henry Ford',	'11/1'),
(44,	'Sooner or later those who win are those who think they can.',	'Richard Bach',	'11/2'),
(45,	'People become really quite remarkable when they start thinking that they can do things. When they believe in themselves they have the first secret of success.',	'Norman Vincent Peale',	'11/3'),
(46,	'Spectacular achievements are always preceded by painstaking preparation.',	'Roger Staubach',	'11/4'),
(47,	'If we did all the things we are capable of doing, we would literally astonish ourselves.',	'Thomas Edison',	'11/5'),
(48,	'The journey of a thousand miles begins with one step.',	' Lao-Tse',	'11/6'),
(49,	'Success is the maximum utilization of the ability that you have.',	'Zig Ziglar',	'11/7'),
(50,	'The difficulties and struggles of today are but the price we must pay for the accomplishments and victories of tomorrow.',	'William Boetcker',	'10/8'),
(51,	'Do what you can with what you have where you are.',	'Theodore Roosevelt',	'11/9'),
(52,	'Failure is the tuition you pay for success.',	'Walter Brunell',	'11/10'),
(53,	'Real wealth equals ideas plus energy.',	'Buckminster Fuller',	'11/11'),
(54,	'We grow great by dreams. All big men are dreamers.',	'Woodrow Wilson',	'11/12'),
(55,	'We are continually faced by great opportunities brilliantly disguised as insoluble problems.',	'Lee Iococca',	'10/13'),
(56,	'Private victories precede public victories.',	'Stephen R. Covey',	'11/14'),
(57,	'Great minds have purpose, others have wishes.',	'Washington Irving',	'11/15'),
(58,	'The common denominator of success is in forming the habit of doing the things that failures don\'t like to do.',	'Albert Gray',	'11/16'),
(59,	'Singleness of purpose is one of the chief essentials for success in life, no matter what may be one\'s aim.',	'John D. Rockefeller',	'11/17'),
(60,	'I will say this about being an optimist: even when things don\'t turn out well, you are certain they will get better.',	'Frank Hughes',	'11/18'),
(61,	'Some men see things as they are, and say, \'Why?\' I dream of things that never were, and say, \'Why not?\'',	'George Bernard Shaw',	'11/19'),
(62,	'Perseverance is a great element of success.',	'Henry Wadsworth Longfellow',	'11/20'),
(63,	'The only limit to our realization of tomorrow will be our doubts of today.',	'Franklin D. Roosevelt',	'11/21'),
(64,	'A person\'s way of doing things is the direct result of the way he thinks about things.',	'Wallace D. Wattles',	'11/22'),
(65,	'Success demands singleness of purpose.',	'Vince Lombardi',	'11/23'),
(66,	'A man is but of product of his thought, What he thinks he becomes.',	'Mahatma Gandhi',	'11/24'),
(67,	'The secret of success is learning how to use pain and pleasure instead of having pain and pleasure use you. If you do that, you\'re in control of your life. If you don\'t, life controls you.',	' Anthony Robbins',	'11/25'),
(68,	'First, say to yourself what you would be, then do what you have to do.',	'Epictetus',	'11/26'),
(69,	'If you can dream it, you can do it. Your limits are all within yourself.',	'Brian Tracy',	'11/27'),
(70,	'A problem is a chance for you to do your best.',	'Duke Ellington',	'11/28'),
(71,	'Nature gave men two ends... one to sit on and one to think with. Ever since then man\'s success or failure has been dependent on the one he used most.',	'George R. Kilpatrick',	'11/29'),
(72,	'The will to do springs from the knowledge that we can do.',	'James Allen',	'11/30'),
(73,	'It is observed that successful people get ahead in the time that other people waste.',	'Henry Ford',	'12/1'),
(74,	'You see things and say, \'Why?\' But I dream of things that never were and say \'Why not?\'',	'George Bernard Shaw',	'12/2'),
(75,	'Many of life\'s failures are people who did not realize how close they were to success when they gave up.',	'Thomas Edison',	'12/3'),
(76,	'You must have long range goals to keep from being frustrated by short-term failures.',	'Bob Bales',	'12/4'),
(77,	'I would rather attempt something great and fail than attempt to do nothing and succeed.',	'Robert Schuller',	'12/5'),
(78,	'What you can do, or dream you can, begin it. Boldness has genius, power, and magic in it.',	'Goethe',	'12/6'),
(79,	'Our lives improve only when we take chances, and the first and most difficult risk we can take is to be honest with ourselves.',	'Walter Anderson',	'12/7'),
(80,	'Either do not attempt at all, or go through with it.',	'Ovid',	'12/8'),
(81,	'I don\'t dream at night, I dream all day. I dream for a living.',	'Steven Spielberg',	'12/9'),
(82,	'Hope is the companion of power and the mother of success. For those of us who hope strongest have within us the gift of miracles.',	'Sydney Bremer',	'12/10'),
(83,	'The gem cannot be polished without friction, nor man perfected without trials.',	'Confucius',	'12/11'),
(84,	'If you don\'t know where you are going, every road will get you nowhere.',	'Henry Kissinger',	'12/12'),
(85,	'Man is what he believes.',	'Anton Chekhov',	'12/13'),
(86,	'Goals are dreams we convert to plans and take action to fulfill.',	'Zig Ziglar',	'12/14'),
(87,	'Four steps to achievement: plan purposefully, prepare prayerfully, proceed positively, pursue persistently.',	'William A. Ward',	'12/15'),
(88,	'I never waste time looking back.',	'Eleanor Roosevelt',	'12/16'),
(89,	'Who told you it couldn\'t be done? And what great achievement has he to his credit that entitles him to use the word \'impossible\' so freely?',	'Napoleon Hill',	'12/17'),
(90,	'Dream no small dreams for they have no power to move the hearts of men.',	'Goethe',	'12/18'),
(91,	'I am a slow walker ... but I never walk backwards.',	'Abraham Lincoln',	'12/19'),
(92,	'An aim in life is the only fortune worth finding, and it is not to be found in foreign lands, but in the heart itself.',	'Robert Louis Stevenson ',	'12/20'),
(93,	'Wherever you see a successful business, someone once made a courageous decision.',	' Peter F. Drucker',	'12/21'),
(94,	'The road to success runs uphill.',	'Willie Davis',	'12/22'),
(95,	'Success requires first expending ten units of effort to produce one unit of results. Your momentum will then produce ten units of results with each unit of effort.',	'Charles Givens',	'12/23'),
(96,	'The only honest measure of your success is what you are doing compared to your true potential.',	'Paul J. Meyer',	'12/24'),
(97,	'Any fact facing us is not as important as our attitude toward it, for that determines our success or failure.',	'Norman Vincent Peale',	'12/25'),
(98,	'It is easy to sit up and take notice. What is difficult is getting up and taking action.',	'Al Batt',	'12/26'),
(99,	'Success is getting what you want. Happiness is wanting what you get',	'Dale Carnegie',	'12/27'),
(100,	'To be successful, the first thing to do is fall in love with your work.',	'Sister Mary Lauretta',	'12/28'),
(101,	'Never, never, never, never give up',	'Winston Churchill',	'12/29'),
(102,	'Ones best success comes after their greatest disappointments.',	'Henry Ward Beecher',	'12/30'),
(103,	'Nothing in the world can take the place of persistence. Talent will not; nothing is more common than unsuccessful men with talent. Genius will not; the world is full of educated derelicts. Persistence and determination alone are omnipotent. The phrase \'press on\' has solved and always will solve the problems of the human race.',	'Calvin Coolidge ',	'12/31'),
(104,	'Anything in life worth having is worth working for.',	'Andrew Carnegie',	'1/1'),
(105,	'Success often comes to those who dare to act. It seldom goes to the timid who are ever afraid of the consequences.',	'Jawaharial Nehru',	'1/2'),
(106,	'Success is never ending, failure is never final.',	'Dr. Robert Schuller',	'1/3'),
(107,	'I just love when people say I can’t do something because all my life people said I wasn’t going to make it.',	'Ted Turner',	'1/4'),
(108,	'Great thoughts speak only to the thoughtful mind, but great actions speak to all mankind.',	'Emily P. Bissell',	'1/5'),
(109,	'Obstacles are those frightful things you can see when you take your eyes off your goal.',	'Henry Ford',	'1/6'),
(110,	'It takes a strong fish to swim against the current. Even a dead one can float with it.',	'John Crowe',	'1/7'),
(111,	'You will never find time for anything. You must make it.',	'Charles Buxton',	'1/8'),
(112,	'Remove failure as an option.',	'Joan Lunden',	'1/9'),
(113,	'There is no one giant step that does it. It\'s a lot of little steps.',	'Peter A. Cohen',	'1/10'),
(114,	'Shoot for the moon. Even if you miss, you will land among the stars.',	'Les Brown',	'1/11'),
(115,	'Some of us have great runways already built for us. If you have one, take off. But if you don\'t have one, realize it is your responsibility to grab a shovel and build one for yourself and for those who will follow after you.',	'Amelia Earhart ',	'1/12'),
(116,	'Work like you don\'t need the money. Love like you\'ve never been hurt. Dance like nobody is watching.',	'Mark Twain',	'1/13'),
(117,	'What the mind of man can conceive and believe, it can achieve.',	'Napoleon Hill',	'1/14'),
(118,	'There are no secrets to success. It is the result of preparation, hard work, and learning from failure.',	'Colin Powell',	'1/15'),
(119,	'What lies behind us and what lies before us are tiny matters compared to what lies within us.',	'Ralph Waldo Emerson',	'1/16'),
(120,	'Great works are performed not by strength but by perseverance.',	'Samuel Johnson',	'1/17'),
(121,	'The difference between a successful person and others is not a lack of strength, not a lack of knowledge, but rather a lack of will.',	'Vince Lombardi',	'1/18'),
(122,	'The man who follows the crowd will usually get no further than the crowd. The man who walks alone is likely to find himself in places no one has ever been.',	'Alan Ashley-Pitt',	'1/19'),
(123,	'It takes 20 years to build a reputation and five minutes to ruin it. If you think about that, you\'ll do things differently.',	'Warren Buffett',	'1/20'),
(124,	'Champions aren\'t made in the gyms. Champions are made from something they have deep inside them - a desire, a dream, a vision.',	'Muhammad Ali',	'1/21'),
(125,	'Dwell not on the past. Use it to illustrate a point, then leave it behind. Nothing really matters except what you do now in this instant of time. From this moment onwards you can be an entirely different person, filled with love and understanding, ready with an outstretched hand, uplifted and positive in every thought and deed.',	'Eileen Caddy',	'1/22'),
(126,	'The critical ingredient is getting off your butt and doing something. It\'s as simple as that. A lot of people have ideas, but there are few who decide to do something about them now. Not tomorrow. Not next week. But today. The true entrepreneur is a doer.',	'Nolan Bushnell ',	'1/23'),
(127,	'Whatever you vividly imagine, ardently desire, sincerely believe, and enthusiastically act upon must inevitably come to pass!',	'Paul J. Meyer',	'1/24'),
(128,	'Keep away from small people who try to belittle your ambitions. Small people always do that, but the really great make you feel that you too can become great.',	'Mark Twain',	'1/25'),
(129,	'For anything worth having one must pay the price; and the price is always work, patience, love, self sacrifice. No paper currency, no promises to pay, but the gold of real service.',	'John Burroughs',	'1/26'),
(130,	'To be successful, you must decide exactly what you want to accomplish, then resolve to pay the price to get it.',	'Bunker Hunt',	'1/27'),
(131,	'You just can\'t beat the person who never gives up.',	'Babe Ruth',	'1/28'),
(132,	'When you get right down to the root of the meaning of the word \'succeed\', you find it simply means to follow through.',	'F.W. Nichol',	'1/29'),
(133,	'Successful people are always looking for opportunities to help others. Unsuccessful people are always asking, \'What\'s in it for me?\'',	'Brian Tracy',	'1/30'),
(134,	'If you don\'t set goals, you can\'t regret not reaching them.',	'Yogi Berra',	'1/31'),
(135,	'Success is achieved by those who try and keep trying with a positive mental attitude.',	'W. Clement Stone',	'2/1'),
(136,	'I couldn\'t wait for success, so I went ahead without it.',	'Jonathan Winters',	'2/2'),
(137,	'What we hope to do with ease, we must learn first to do with diligence.',	'Samuel Johnson',	'2/3'),
(138,	'We do our best that we know how at the moment, and if it doesn\'t turn out, we modify it.',	'Franklin Delano Roosevelt',	'2/4'),
(139,	'A Native American grandfather was talking to his grandson about how he felt. He said, \'I feel as if I have two wolves fighting in my heart. One wolf is the vengeful, violent one, the other wolf is the loving compassionate one.\' The grandson asked him, \'Which wolf will win the fight in your heart?\' The grandfather answered, \'The one I feed.\'',	'Blackhawk',	'2/5'),
(140,	'Enthusiasm is the steam that drives the engine.',	'Napoleon Hill',	'2/6'),
(141,	'The winners in life think constantly in terms of I can, I will, and I am. Losers, on the other hand, concentrate their waking thoughts on what they should have or would have done, or what they can\'t do.',	'Dennis Waitley',	'2/7'),
(142,	'Success in life has nothing to do with what you gain in life or accomplish for yourself. It\'s what you do for others.',	'Danny Thomas',	'2/8'),
(143,	'Empty pockets never held anyone back. Only empty heads and empty hearts can do that.',	'Norman Vincent Peale',	'2/9'),
(144,	'One man with courage is a majority.',	'Andrew Jackson',	'2/10'),
(145,	'Not many people are willing to give failure a second opportunity. They fail once and it is all over. The bitter pill of failure is often more than most people can handle. If you are willing to accept failure and learn from it, if you are willing to consider failure as a blessing in disguise and bounce back, you have got the essential of harnessing one of the most powerful success forces.',	'Joseph Sugarman',	'2/11'),
(146,	'Every achiever I have ever met says, \'My life turned around when I began to believe in me.',	'Robert Schuller',	'2/12'),
(147,	'I don\'t measure a man\'s success by how high he climbs but how high he bounces when he hits bottom.',	'George Patton',	'2/13'),
(148,	'One step - choosing a goal and sticking to it - changes everything.',	'Scott Reed',	'2/14'),
(149,	'Dependent people need others to get what they want. Independent people can get what they want through their own efforts. Interdependent people combine their own efforts with the efforts of others to achieve their greatest success.',	'Stephen Covey',	'2/15'),
(150,	'I don\'t know what your destiny will be, but one thing I do know: The only ones among you who will be really happy are those who have sought and found how to serve.',	'Albert Schweitzer',	'2/16'),
(151,	'Success is the child of audacity.',	'Benjamin Disraeli',	'2/17'),
(152,	'Teamwork is the long word for success.',	'Jacquelinemae A. Rudd',	'2/18'),
(153,	'Except and expect positive things and that is what you will receive.',	'Lori Hard',	'2/19'),
(154,	'You measure the size of the accomplishment by the obstacles you had to overcome to reach your goals.',	'Booker T. Washington',	'2/20'),
(155,	'In order to succeed you must fail so that you know what not to do the next time.',	'Anthony J. D\'Angelo',	'2/21'),
(156,	'Those at the top of the mountain didn\'t fall there.',	'Marcus Washling',	'2/22'),
(157,	'Motivation is what gets you started. Habit is what keeps you going!',	'Jim Ryun',	'2/23'),
(158,	'I am enough of an artist to draw freely upon my imagination. Imagination is more important than knowledge. Knowledge is limited. Imagination encircles the world.',	'Albert Einstein',	'2/24'),
(159,	'Only those who risk going too far can possibly find out how far one can go.',	'T.S. Eliot',	'2/25'),
(160,	'It\'s amazing what ordinary people can do if they set out without preconceived notions.',	'Charles F. Kettering',	'2/26'),
(161,	'People who are afraid to fail can never experience the joys of success.',	'Pete Zafra',	'2/27'),
(162,	'No matter how small, acknowledge the achievement.',	'Greg Henry Quinn',	'2/28'),
(163,	'If you don\'t quit, and don\'t cheat, and don\'t run home when trouble arrives, you can only win.',	'Shelley Long',	'3/1'),
(164,	'Put your heart, mind, intellect, and soul even to your smallest acts. This is the secret of success.',	'Swami Sivananda',	'3/2'),
(165,	'The person who makes a success of living is the one who sees his goal steadily and aims for it unswervingly. That is dedication.',	'Cecil B. DeMille',	'3/3'),
(166,	'One only gets to the top rung on the ladder by steadily climbing up one at a time, and suddenly, all sorts of powers, all sorts of abilities which you thought never belonged to you - suddenly become within your own possibility and you think, \'Well, I\'ll have a go, too.',	'Margaret Thatcher',	'3/4'),
(167,	'It is in the small decisions you and I make every day that create our destiny.',	'Anthony Robbins',	'3/5'),
(168,	'Deliver more than you are getting paid to do. The victory of success will be half won when you learn the secret of putting out more than is expected in all that you do. Make yourself so valuable in your work that eventually you will become indispensable. Exercise your privilege to go the extra mile, and enjoy all the rewards you receive.',	' Og Mandino',	'3/6'),
(169,	'Life is not easy for any of us, but what of that? We must have perseverance and above all confidence in ourselves.',	'Marie Curie',	'3/7'),
(170,	'There are two primary choices in life: to accept conditions as they exist, or accept the responsibility for changing them.',	' Denis Waitley',	'3/8'),
(171,	'Effective people are not problem-minded; they\'re opportunity-minded. They feed opportunities and starve problems.',	'Stephen Covey',	'3/9'),
(172,	'A professional is a person who can do his best at time when he doesn\'t particularly feel like it.',	'Alistair Cooke',	'3/10'),
(173,	'Whatever your grade or position, if you know how and when to speak, and when to remain silent, your chances of real success are proportionately increased.',	'Ralph C. Smedley',	'3/11'),
(174,	'I do not think there is any other quality so essential to success of any kind as the quality of perseverance. It overcomes almost everything, even nature.',	'John D. Rockefeller',	'3/12'),
(175,	'I know the price of success: dedication, hard work and an unremitting devotion to the things you want to see happen.',	'Frank Lloyd Wright',	'3/13');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `maritalStatus` varchar(10) DEFAULT NULL,
  `dob_day` varchar(10) DEFAULT NULL,
  `dob_month` varchar(15) DEFAULT NULL,
  `dob_year` varchar(10) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `placeOfBirth` varchar(100) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `nextOfKin` varchar(50) DEFAULT NULL,
  `nextOfKinAddress` varchar(50) DEFAULT NULL,
  `localGovernment` varchar(30) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `homeAddress` varchar(100) DEFAULT NULL,
  `hobbies` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `fullname`, `phone`, `email`, `maritalStatus`, `dob_day`, `dob_month`, `dob_year`, `nationality`, `placeOfBirth`, `languages`, `state`, `nextOfKin`, `nextOfKinAddress`, `localGovernment`, `username`, `password`, `homeAddress`, `hobbies`) VALUES
(1,	'Samira Halilu Getso',	'07035213380',	'samiragetso@gmail.com',	'Single',	'18',	'February',	'1997',	'Nigerian',	'',	'Hausa and English',	'Kano',	'Ibrahim Halilu Getso',	'Gadon Kaya',	'Gwale',	'samira',	'e38ad214943daad1d64c102faec29de4afe9da3d',	'',	'Reading and Writing'),
(2,	'Umar Sunusi Maitalata',	'08098069816',	'maitalata@gmail.com',	'Single',	'25',	'July',	'1993',	'Nigerian',	'No. 317 Dala Quarters',	'Hausa and English',	'Kano State',	'Abdulkadir Sunusi',	'No. 317 Dala Quarters',	'Dala',	'maitalata',	'1be36a9b2ca4fbe88f8650c8c49756838039ddac',	'No. 317 Dala Quarters',	'Reading, Snorkeling and Writing'),
(3,	'Amina Sunusi Maitalata',	NULL,	'aminasunusi555@gmail.com',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'amina',	'e38ad214943daad1d64c102faec29de4afe9da3d',	NULL,	NULL),
(4,	'Maryam Musa',	'',	'maryam@yahoo.com',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'maryam12',	'e38ad214943daad1d64c102faec29de4afe9da3d',	'',	''),
(5,	'ahmad musa ubale',	NULL,	'amuket538@gmail.com',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'amuket',	'82a5ab6d2cf0a449b6512ddca6fa8ef9fd2b98ab',	NULL,	NULL);

DROP TABLE IF EXISTS `work`;
CREATE TABLE `work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `position` varchar(50) NOT NULL,
  `placeOfWork` varchar(200) NOT NULL,
  `fromD` varchar(20) NOT NULL,
  `toD` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `work` (`id`, `user`, `position`, `placeOfWork`, `fromD`, `toD`) VALUES
(1,	'samira',	'Ass. Secretary',	'Microsoft',	'2016',	'2018'),
(2,	'maitalata',	'Computer Lab Assistant',	'Aminu Kano College of Islamic and Legal Studies',	'2013',	'2014'),
(5,	'maitalata',	'Chief Programmer',	'SConnect',	'2017',	'2018'),
(6,	'maitalata',	'Chief Technology Officer',	'iWorldOfTech',	'2018',	'to date'),
(8,	'amuket',	'Secretary',	'Wiretech IT Solutions',	'1962',	'1963');

DROP TABLE IF EXISTS `qt`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `qt` AS select `quotes`.`id` AS `id`,`quotes`.`quote` AS `quote`,`quotes`.`author` AS `author` from `quotes`;

-- 2019-03-05 12:15:15
