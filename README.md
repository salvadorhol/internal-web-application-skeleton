internal-web-application-skeleton
=================================

Ideal skeleton application for internal networks using PHP, MySQL and angularjs. 

Because this is meant for internal networks, I did not implement a tougher encryption method for password storage. In a later commit I will. 

user table create syntax:

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `password` char(64) NOT NULL,
  `access` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1
