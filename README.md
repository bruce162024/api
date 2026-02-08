## IRRS API (Render)

Simple PHP API for Incident Response Referral System

## Endpoint
POST /api/submit_referral.php

## Content-Type
application/json

## Example Body
{
  "patient": {
    "name": "Juan Dela Cruz",
    "age": 35
  },
  "incident": {
    "date": "2026-02-08",
    "time": "14:30"
  }
}

## Response
{
  "status": "ok",
  "id": 12
}
