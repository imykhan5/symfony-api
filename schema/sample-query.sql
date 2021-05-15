SELECT * 
FROM facts f
	INNER JOIN  attributes a ON(a.id = f.attribute_id)
	INNER JOIN securities s ON(s.id = f.security_id)
WHERE a.name = 'sales'
	AND s.symbol = 'ABC'