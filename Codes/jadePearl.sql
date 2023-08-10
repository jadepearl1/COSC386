/* Q1: Finding the ships heavier than 35000 tons */
SELECT Ships.name, Ships.class, Classes.displacement
FROM Ships, Classes
WHERE Ships.class = Classes.class AND Classes.displacement > 35000;
/*Result of query:
name			| class		| displacement
----------------------------------------------------
Iowa			| Iowa  		| 46000
Missouri		| Iowa		| 46000	
Musashi		| Yamato		| 65000	
New Jersey		| Iowa		| 46000	
North Carolina	| North Carolina	| 37000	
Washington		| North Carolina	| 37000	
Wisconsin		| Iowa		| 46000	
Yamato		| Yamato		| 65000
*/


/* Q2: List name, displacement, and number of guns of the ships engaged in the battle
of Guadalcanal */
SELECT Ships.name, Classes.displacement, Classes.numGuns
FROM Ships, Classes, Battles, Outcomes
WHERE Ships.name = Outcomes.ship AND Ships.class = Classes.class AND Battles.name = Outcomes.battle AND Battles.name = 'Guadalcanal';
/*Result of Query:
    name	|   displacement	| numGuns
------------------------------------------
Kirishima	|     32000		|   8
Washington	|     37000		|   9	
*/



/* Q3: List all ships in the database (Remember all these ships may not appear in the ships relation) */
SELECT name
FROM Ships
UNION SELECT ship FROM Outcomes;
/*Result of Query:
name
-----------------
California
Haruna
Hiei
Iowa
Kirishima
Kongo
Missouri
Musashi
New Jersey
North Carolina
Ramillies
Resolution
Revenge
Royal Oak
Royal Sovereign
Renown
Repulse
Tennessee
Washington
Wisconsin
Yamato
Arizona
Bismark
Duke of York
Fuso
Hood
King George V
Prince of Wales
Rodney
Scharnhorst
South Dakota
West Virginia
Yamashiro
*/


/* Q4: Find countries that have battle ships and battle cruisers */
SELECT country
FROM Classes
WHERE type IN ('bb', 'bc')
GROUP BY country
HAVING COUNT(DISTINCT type) = 2;
/*Result of Query:
country
------------
Gt. Britain
Japan
*/


/* Q5: Find battles with at least 3 ships of the same country */
SELECT Outcomes.battle, Classes.country, COUNT(*) as num_ships
FROM Outcomes
JOIN Ships ON Outcomes.ship = Ships.name
JOIN Classes ON Ships.class = Classes.class
GROUP BY Outcomes.battle, Classes.country
HAVING COUNT(*) >= 3;
/*Result of Query:
battle  |   country |   num_ships
---------------------------------

Note: Table was BLANK
*/