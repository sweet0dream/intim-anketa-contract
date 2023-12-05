# Intim Anketa Contract

Install: ```composer req sweet0dream/intim-anketa-contract```

### Available types in Contract:

1. ind -> Type: individualki
2. sal -> Type: intimsalony
3. man -> Type: muzhskoi-eskort
4. tsl -> Type: transseksualki

### Use:

Check namespace

```use Sweet0dream\IntimAnketaContract;```

Get all fields for checked type

```(new IntimAnketaContract({TYPE}))->getField()```

> return data as array

```(new IntimAnketaContract({TYPE}))->toJson()```

> return data as JSON object