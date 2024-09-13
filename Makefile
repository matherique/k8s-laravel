app-1: 
	@curl -s localhost:8000/app1/health | jq
app-2: 
	@curl -s localhost:8000/app2/health | jq 
both: 
	@curl -s localhost:8000/app1/app2 | jq
	@curl -s localhost:8000/app2/app1 | jq
