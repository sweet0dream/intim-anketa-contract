# Intim Anketa Contract

Install: ```composer req sweet0dream/intim-anketa-contract```

### Available types in Contract:

1. ind -> Type: individualki
2. sal -> Type: intimsalony
3. man -> Type: muzhskoi-eskort
4. tsl -> Type: transseksualki
5. mas -> Type: eromassazh

### Use:

Check namespace

```use Sweet0dream\IntimAnketaContract;```

Get all fields for checked type

```(new IntimAnketaContract({TYPE}))->getField()```

> return data as array

```(new IntimAnketaContract({TYPE}))->toJson()```

> return data as JSON object

```(new IntimAnketaContract({TYPE}))->getSingularMeta()```

> return array all supported types in singular word mode

```(new IntimAnketaContract({TYPE}))->getPluralMeta()```

> return array all supported types in plural word mode

```(new IntimAnketaContract({TYPE}))->getSingularTypeName()```

> return string selected type in singular mode word

```(new IntimAnketaContract({TYPE}))->getPluralTypeName()```

> return string selected type in plural mode word