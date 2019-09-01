# Bitwise

## Install

```php
composer require nekoos-pood/bitwise-flag
```

## Usage

### set

Flag up `bit` in current `flag set`

```php
$flag = E_NOTICE;

BitwiseFlag::set($flags, E_RECOVERABLE_ERROR, true);

# $flag = E_NOTICE | E_RECOVERABLE_ERROR;
```

Flag down `bit` in current `flag set`

```php
$flag = E_ALL;

BitwiseFlag::set($flags, E_NOTICE, false);

# $flag = E_ALL & ~E_NOTICE;
```

match

Check in the current `set of flags` if it is up `bit`

```php
$flag = E_ALL & ~E_NOTICE;

$check1 = BitwiseFlag::match($flags, E_RECOVERABLE_ERROR);
$check2 = BitwiseFlag::match($flags, E_NOTICE);

# $check1 = true;
# $check2 = false;
```

