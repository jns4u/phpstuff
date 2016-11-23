#!/bin/bash
# pass gituser name in commandline to check git user details, for example jns4u
if [ $# -ne 1 ]; then
 echo "Usage: $0 <username>"
 exit 1
fi

curl -s "https://api.github.com/users/$1" | \
 awk -F'"' '
 /\"name\":/ {
  print $4" is the name of the GitHub user."
 }
 /\"followers\":/{
  split($3, a, " ")
  sub(/,/, "", a[2])
  print "They have "a[2]" followers."
 }
 /\"following\":/{
  split($3, a, " ")
  sub(/,/, "", a[2])
  print "They are following "a[2]" other users."
 }
 /\"created_at\":/{
  print "Their account was created on "$4"."
 }
 '
exit 0
