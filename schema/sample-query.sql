SELECT * 
FROM facts f
	INNER JOIN  attributes a ON(a.id = f.attribute_id)
	INNER JOIN securities s ON(s.id = f.security_id)
WHERE a.name = 'eps'
	AND s.symbol = 'CDE'; 
	
	
SELECT * 
FROM facts f
	INNER JOIN  attributes a ON(a.id = f.attribute_id)
	INNER JOIN securities s ON(s.id = f.security_id)
WHERE a.name = 'shares'
	AND s.symbol = 'CDE'; 
	
	
	
SELECT * 
FROM facts f
	INNER JOIN  attributes a ON(a.id = f.attribute_id)
	INNER JOIN securities s ON(s.id = f.security_id)
WHERE a.name = 'assets'
	AND s.symbol = 'CDE'; 
	
SELECT * 
FROM facts f
	INNER JOIN  attributes a ON(a.id = f.attribute_id)
	INNER JOIN securities s ON(s.id = f.security_id)
WHERE a.name = 'liabilities'
	AND s.symbol = 'CDE'; 
	
	
	
SELECT * 
FROM facts f
	INNER JOIN  attributes a ON(a.id = f.attribute_id)
	INNER JOIN securities s ON(s.id = f.security_id)
WHERE a.name = 'sales'
	AND s.symbol = 'ABC'; 
	
	
	
SELECT * 
FROM facts f
	INNER JOIN  attributes a ON(a.id = f.attribute_id)
	INNER JOIN securities s ON(s.id = f.security_id)
WHERE a.name = 'price'
	AND s.symbol = 'BCD'; 
	
SELECT * 
FROM facts f
	INNER JOIN  attributes a ON(a.id = f.attribute_id)
	INNER JOIN securities s ON(s.id = f.security_id)
WHERE a.name = 'eps'
	AND s.symbol = 'BCD'; 