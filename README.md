# napredne_baze

SPAJANJE NA NEO4J BAZU:

-preko browsera : http://browser-canary.graphapp.io/
NEO4J_URI=neo4j+s://d9646c66.databases.neo4j.io
NEO4J_USERNAME=neo4j
NEO4J_PASSWORD=gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A
AURA_INSTANCEID=d9646c66
AURA_INSTANCENAME=Instance01

MATCH (p1:Person {username: 'lilee'}), (p2:Person {username: 'tina122'})
CREATE (p1)-[:FRIENDS]->(p2)
